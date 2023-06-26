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

        public $connect;

        public function cadastrar($nome, $cpf, $dataNasc, $email, $senha, $cidade, $bairro, $rua, $numero, $complemento): string
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

        public function listar()
        {
            $conn = new Conn();
            $this->connect =$conn->conectar();

            $queryUsuarios = "SELECT id, nome, email FROM Usuario ORDER BY id DESC LIMIT 40";
            $resultUsuarios = $this->connect->prepare($queryUsuarios);
            $resultUsuarios->execute();
            return $resultUsuarios->fetchALL();
        }
    }
?>