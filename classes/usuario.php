<?php
    require "../conexao.php";

    class Usuario{
        public string $nome;
        public string $cpf;
        public string $dataNasc;
        public string $senha;
        public string $email;
        public string $cidade;
        public string $bairro;
        public string $rua;
        public int $numero;
        public string $complemento;

        public function cadastrar($nome, $cpf, $dataNasc, $email, $senha, $cidade, $bairro, $rua, $numero, $complemento)
        {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->dataNasc = $dataNasc;
            $this->senha = $senha;
            $this->email = $email;
            $this->cidade = $cidade;
            $this->bairro = $bairro;
            $this->rua = $rua;
            $this->numero = $numero;
            $this->complemento = $complemento;

            $conn = new Conn();

            $query = "INSERT INTO Usuario(nomeUsuario, cpfUsuario, nascUsuario, senhaUsuario, emailUsuario, cidadeUsuario, bairroUsuario, ruaUsuario, numeroUsuario, compleUsuario) VALUES ('".$this->nome."', '".$this->cpf."', '".$this->dataNasc."', '".$this->senha."', '".$this->email."', '".$this->cidade."', '".$this->bairro."', '".$this->rua."', '".$this->numero."', '".$this->complemento."')";
            
            $result = $conn->conectar()->prepare($query);
            $result->execute();
        }

        public function login($cpf, $senha)
        {
            $this->cpf = $cpf;
            $this->senha = $senha;

            $conn = new Conn();
            $pdo = $conn->conectar();

            try {
                $query = "SELECT * FROM Usuario WHERE cpfUsuario = :cpf AND senhaUsuario = :senha";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':cpf', $this->cpf);
                $stmt->bindParam(':senha', $this->senha);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    // Autenticação bem-sucedida
                    session_start();
                    $_SESSION['cpf'] = $user['cpfUsuario'];
                    // Redirecionar para página de sucesso ou página restrita
                    header("Location: ../home.php");
                    exit();
                } else {
                    // Autenticação falhou
                    echo "<script>alert('Usuário ou senha inválidos!'); window.location.href = '../index.php';</script>";
                }
            } catch (PDOException $e) {
                echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            }
        }
    }
?>