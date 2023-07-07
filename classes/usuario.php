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
                    $this->gerarConta($cpf);
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

            $sql = "SELECT * FROM Usuario WHERE cpfUsuario = :cpf";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch();
                // echo "<script>console.log($user)</script>";
                
                // Verifique a senha usando password_verify()
                if (password_verify($this->senha, $user['senhaUsuario'])) {
                    // Autenticação bem-sucedida
                    session_start();
                    $_SESSION['dadosUser'] = $user;
                    // Redirecionar para página de sucesso ou página restrita
                    header("Location: ../home.php");
                    // exit();
                } else {
                    // Senha incorreta
                    echo "<script>alert('Senha inválida!'); window.location.href = '../index.php';</script>";
                }
            } else {
                // Autenticação falhou
                echo "<script>alert('Usuário inválido!'); window.location.href = '../index.php';</script>";
            }
            
        }

        public function editar($nome, $cpf, $dataNasc, $email, $cidade, $bairro, $rua, $numero, $complemento){

            session_start();
            $_SESSION['dadosUser'] = array(
                'nomeUsuario' => $nome,
                'cpfUsuario' => $cpf,
                'nascUsuario' => $dataNasc,
                'emailUsuario' => $email,
                'cidadeUsuario' => $cidade,
                'bairroUsuario' => $bairro,
                'ruaUsuario' => $rua,
                'numeroUsuario' => $numero,
                'compleUsuario' => $complemento
            );

            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->dataNasc = $dataNasc;
            $this->email = $email;
            $this->cidade = $cidade;
            $this->bairro = $bairro;
            $this->rua = $rua;
            $this->numero = $numero;
            $this->complemento = $complemento;

            $conn = new Conn();
            $pdo = $conn->conectar();

            // Atualizar o usuário no banco de dados
            $sql = "UPDATE Usuario SET nomeUsuario = :nome, nascUsuario = :dataNasc, emailUsuario = :email, cidadeUsuario = :cidade, bairroUsuario = :bairro, ruaUsuario = :rua, numeroUsuario = :numero, compleUsuario = :complemento WHERE cpfUsuario = :cpf";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':dataNasc', $this->dataNasc);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cidade', $this->cidade);
            $stmt->bindParam(':bairro', $this->bairro);
            $stmt->bindParam(':rua', $this->rua);
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':complemento', $this->complemento);

            if ($stmt->execute()) {
                // header('Location: ../perfil.php');
                // echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href = '../perfil.php';</script>";
                return 200;
            } else {
                // echo "<script>alert('Erro ao atualizar usuário!');</script>";
                return 400;
            }

        }

        public function deletar($idUsuario){
            $conn = new Conn();
            $pdo = $conn->conectar();

            // deleta a conta para posteriormente deletar usuário(não tem ON DELETE CASCADE no BD)
            $sql = "DELETE FROM Conta WHERE Usuario_Conta_idUsuario = :idUsuario";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $sql1 = "DELETE FROM Usuario WHERE idUsuario = :idUsuario";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->bindParam(':idUsuario', $idUsuario);
                $stmt1->execute();
                
                if ($stmt1->rowCount() === 1){
                    return 200;
                }else{
                    echo "<script>alert('Erro ao deletar usuário!');</script>";
                }
                
            } else {
                echo "<script>alert('Erro ao deletar usuário!');</script>";
                return 400;
            }
            
        }

        public function gerarConta($cpf)
        {
            $this->cpf = $cpf;

            $conn = new Conn();
            $pdo = $conn->conectar();

            $sql = "SELECT idUsuario FROM Usuario WHERE cpfUsuario = :cpf";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch();
                $id = $user["idUsuario"];
                $agConta = "0407";

                // Gerar número de conta único
                $numeroConta = $this->gerarNumeroContaUnico($pdo);

                $saldoConta = 0.0;

                $sqlGerarConta = "INSERT INTO Conta (agConta, numeroConta, saldoConta, Usuario_Conta_idUsuario) VALUES (:agConta, :numeroConta, :saldoConta, :idUsuario)";
                $stmtGerarConta = $pdo->prepare($sqlGerarConta);
                $stmtGerarConta->bindParam(':agConta', $agConta);
                $stmtGerarConta->bindParam(':numeroConta', $numeroConta);
                $stmtGerarConta->bindParam(':saldoConta', $saldoConta);
                $stmtGerarConta->bindParam(':idUsuario', $id);
                $stmtGerarConta->execute();
            } else {
                // Autenticação falhou
                echo "<script>alert('Usuário inexistente!'); window.location.href = '../index.php';</script>";
            }
        }

        private function gerarNumeroContaUnico($pdo)
        {
            $numeroExistente = true;
            $numeroConta = '';

            while ($numeroExistente) {
                $n1 = random_int(1, 99999999);
                $n2 = random_int(1, 9);
                $numeroConta = $n1 . "-" . $n2;

                $sqlVerificarConta = "SELECT COUNT(*) FROM Conta WHERE numeroConta = :numeroConta";
                $stmtVerificarConta = $pdo->prepare($sqlVerificarConta);
                $stmtVerificarConta->bindParam(':numeroConta', $numeroConta);
                $stmtVerificarConta->execute();

                $count = $stmtVerificarConta->fetchColumn();

                if ($count === 0) {
                    $numeroExistente = false;
                }
            }

            return $numeroConta;
        }

    }
?>