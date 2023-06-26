<?php
    require "./conexao.php";

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

            return "O usuario <strong>{$this->nome}</strong> possui cpf <strong>{$this->cpf}</strong> com a data de nascimento <strong>{$this->dataNasc}</strong> com a senha <strong>{$this->senha}</strong> com o email <strong>{$this->email}</strong> com endereço <strong>{$this->cidade}, {$this->bairro}, {$this->rua} - {$this->numero} - {$this->complemento} - </strong> foi cadastrado com sucesso!";
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