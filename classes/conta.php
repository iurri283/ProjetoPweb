<?php
    require "./conexao.php";

    class Conta{
        public string $agencia;
        public string $numero;
        public string $saldo;
        public int $conta_idUsuario;

        public function getConta($idUsuario){
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

        public function depositar($idUsuario){
            $conn = new Conn();
            $pdo = $conn->conectar();

            $this->conta_idUsuario = $idUsuario;

            $sql = "SELECT * FROM Conta WHERE Usuario_Conta_idUsuario = :idUsuario";//ajustar
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idUsuario', $this->conta_idUsuario);
            $stmt->execute();

            if ($stmt->rowCount() === 1){
                $dadosConta = $stmt->fetch();
                $_SESSION['dadosConta'] = $dadosConta;
            }
        }
    }
?>