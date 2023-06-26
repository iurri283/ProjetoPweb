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

            $query = "SELECT * FROM Usuarios WHERE cpfUsuario=".$this->cpf." AND senhaUsuario=".$this->senha."";

            $result = $conn->conectar()->prepare($query);
            $result->execute();
        }
    }
?>