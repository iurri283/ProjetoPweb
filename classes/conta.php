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
    }
?>