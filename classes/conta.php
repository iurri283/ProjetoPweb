<?php
    require "../conexao.php";

    class Usuario{
        public string $agencia;
        public string $numero;
        public string $saldo;

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
    }
?>