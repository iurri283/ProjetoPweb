<?php
    class Conta{
        public string $agencia;
        public string $numero;
        public string $saldo;
        public int $conta_idUsuario;

        public function getConta($idUsuario){
            require "./conexao.php";
            $conn = new Conn();
            $pdo = $conn->conectar();

            $this->conta_idUsuario = $idUsuario;

            $sql = "SELECT * FROM Conta WHERE Usuario_Conta_idUsuario = :idUsuario";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idUsuario', $this->conta_idUsuario);
            $stmt->execute();

            if ($stmt->rowCount() === 1){
                $dadosConta = $stmt->fetch();
                $_SESSION['dadosConta'] = $dadosConta;
            }
        }

        public function depositar($idUsuario, $valorDeposito){
            require "../conexao.php";
            $conn = new Conn();
            $pdo = $conn->conectar();
            
            $this->saldo = $valorDeposito;
            $this->conta_idUsuario = $idUsuario;

            $sql = "UPDATE conta SET saldoConta = saldoConta + :valorDeposito WHERE Usuario_Conta_idUsuario = :idUsuario";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':valorDeposito', $this->saldo);
            $stmt->bindParam(':idUsuario', $this->conta_idUsuario);
            $stmt->execute();

            if ($stmt->rowCount() === 1){
                $sql2 = "SELECT saldoConta FROM conta WHERE Usuario_Conta_idUsuario = :idUsuario";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->bindParam(':idUsuario', $this->conta_idUsuario);
                $stmt2->execute();

                echo "<script>alert('Depósito realizado com sucesso!'); window.location.href = '../home.php';</script>";
                if ($stmt->rowCount() === 1){

                    $saldoConta = $stmt2->fetch();
                    $_SESSION['dadosConta'][3] = $saldoConta;
                }
            }
        }

        public function sacar($idUsuario, $valorSaque){
            require "../conexao.php";
            $conn = new Conn();
            $pdo = $conn->conectar();

            $conta = $_SESSION['dadosConta'];

            $this->conta_idUsuario = $idUsuario;
            $this->saldo = $conta['saldoConta'];
            
            echo "<script>console.log('valor do saque: " . $valorSaque . " saldo: " . $this->saldo . "');</script>";
            //VERIFICANDO SE O VALOR DO SAQUE É MAIOR QUE O SALDO
            if($valorSaque > $this->saldo){
                echo "<script>alert('Saldo insuficiente!'); window.location.href = '../saque.php';</script>";
            }else{
                $sql1 = "UPDATE conta SET saldoConta = saldoConta - :valorSaque WHERE Usuario_Conta_idUsuario = :idUsuario";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->bindParam(':valorSaque', $valorSaque);
                $stmt1->bindParam(':idUsuario', $this->conta_idUsuario);
                $stmt1->execute();

                if ($stmt1->rowCount() === 1){
                    $sql2 = "SELECT saldoConta FROM conta WHERE Usuario_Conta_idUsuario = :idUsuario";
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->bindParam(':idUsuario', $this->conta_idUsuario);
                    $stmt2->execute();
    
                    echo "<script>alert('Saque realizado com sucesso!'); window.location.href = '../home.php';</script>";
                    if ($stmt2->rowCount() === 1){
                        $saldoConta = $stmt2->fetch();
                        $_SESSION['dadosConta'][3] = $saldoConta;
                    }
                }
            }               
        }

        public function transferir($idUsuario, $saldoConta, $valorTransferencia, $cpfDestino){
            require "../conexao.php";
            $conn = new Conn();
            $pdo = $conn->conectar();

            $sql = "SELECT * FROM Usuario WHERE cpfUsuario = :cpf;";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cpf', $cpfDestino);
            $stmt->execute();
            $Usuario = $stmt->fetch();

            $idUsuarioDest = $Usuario['idUsuario'];

            // echo "<script>console.log('{$idUsuarioDest['idUsuario']}');</script>";

            
            if($stmt->rowCount() == 0){
                echo "<script>alert('Usuário não encontrado!');window.location.href = '../transferencia.php';</script>";
            }else{
                //se existir o usuário, faça:

                $this->conta_idUsuario = $idUsuario;
                $this->saldo = $saldoConta;
                
                // echo "<script>console.log('valor do saque: " . $valorSaque . " saldo: " . $this->saldo . "');</script>";
                //VERIFICANDO SE O VALOR DO SAQUE É MAIOR QUE O SALDO
                if($valorTransferencia > $this->saldo){
                    echo "<script>alert('Saldo insuficiente!'); window.location.href = '../transferencia.php';</script>";
                }else{
                    //retira do usuario atual
                    $sql1 = "UPDATE conta SET saldoConta = saldoConta - :valorTransferencia WHERE Usuario_Conta_idUsuario = :idUsuario";
                    $stmt1 = $pdo->prepare($sql1);
                    $stmt1->bindParam(':valorTransferencia', $valorTransferencia);
                    $stmt1->bindParam(':idUsuario', $this->conta_idUsuario);
                    $stmt1->execute();

                    //insere no destino
                    $sql2 = "UPDATE conta SET saldoConta = saldoConta + :valorTransferencia WHERE Usuario_Conta_idUsuario = :idUsuario";
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->bindParam(':valorTransferencia', $valorTransferencia);
                    $stmt2->bindParam(':idUsuario', $idUsuarioDest);
                    $stmt2->execute();

                    //atualizando a variável global da conta ($_SESSION['dadosConta'])
                    if (($stmt1->rowCount() === 1) and ($stmt2->rowCount() === 1)){
                        $sql3 = "SELECT saldoConta FROM conta WHERE Usuario_Conta_idUsuario = :idUsuario";
                        $stmt3 = $pdo->prepare($sql3);
                        $stmt3->bindParam(':idUsuario', $this->conta_idUsuario);
                        $stmt3->execute();

                        echo "<script>alert('Transferência realizada com sucesso!'); window.location.href = '../home.php';</script>";
                        if ($stmt3->rowCount() === 1){
                            $saldoConta = $stmt3->fetch();
                            $_SESSION['dadosConta'][3] = $saldoConta;
                        }
                    }
                }               
            }
        }
    }
?>