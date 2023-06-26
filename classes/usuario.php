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
            $pdo = $conn->conectar();

            // Consulta para verificar se o usuário já existe
            $sql = "SELECT * FROM Usuario WHERE cpfUsuario = :cpf";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->execute();

            // Verificar se o usuário já está cadastrado
            if ($stmt->rowCount() > 0) {
                echo "<script>alert('CPF já cadastrado!'); window.location.href = '../index.php';</script>";
            } else {
                // Inserir o novo usuário no banco de dados
                $sql = "INSERT INTO Usuario (nomeUsuario, cpfUsuario, nascUsuario, senhaUsuario, emailUsuario, cidadeUsuario, bairroUsuario, ruaUsuario, numeroUsuario, compleUsuario) VALUES (:nome, :cpf, :dataNasc, :senha, :email, :cidade, :bairro, :rua, :numero, :complemento)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $this->nome);
                $stmt->bindParam(':cpf', $this->cpf);
                $stmt->bindParam(':dataNasc', $this->dataNasc);
                $stmt->bindParam(':senha', $this->senha);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':cidade', $this->cidade);
                $stmt->bindParam(':bairro', $this->bairro);
                $stmt->bindParam(':rua', $this->rua);
                $stmt->bindParam(':numero', $this->numero);
                $stmt->bindParam(':complemento', $this->complemento);

                if ($stmt->execute()) {
                    echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '../index.php';</script>";
                } else {
                    echo "<script>alert('Erro ao cadastrar usuário!'); window.location.href = '../index.php';</script>";
                }
            }
        }

        public function login($cpf, $senha)
        {
            $this->cpf = $cpf;
            $this->senha = $senha;

            $conn = new Conn();
            $pdo = $conn->conectar();

            $query = "SELECT * FROM Usuario WHERE cpfUsuario = :cpf";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch();
                
                // Verifique a senha usando password_verify()
                if (password_verify($this->senha, $user['senhaUsuario'])) {
                    // Autenticação bem-sucedida
                    session_start();
                    $_SESSION['cpf'] = $user['cpfUsuario'];
                    // Redirecionar para página de sucesso ou página restrita
                    header("Location: ../home.php");
                    exit();
                } else {
                    // Senha incorreta
                    echo "<script>alert('Senha inválida!'); window.location.href = '../index.php';</script>";
                }
            } else {
                // Autenticação falhou
                echo "<script>alert('Usuário inválido!'); window.location.href = '../index.php';</script>";
            }
            
        }
    }
?>