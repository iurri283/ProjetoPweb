<?php
    require "./conexao.php";

    class Usuario{
        private string $nome;
        private string $cpf;
        private string $dataNasc;
        private string $senha;
        private string $email;
        private string $cidade;
        private string $bairro;
        private string $rua;
        private int $numero;
        private string $complemento;

        public $connect;

        public function cadastrar($nome, $cpf, $dataNasc, $senha, $email, $cidade, $bairro, $rua, $numero, $complemento){

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

            return "O usuario <strong>{$this->nome}</strong> possui cpf <strong>{$this->cpf}</strong> com a data de nascimento <strong>{$this->dataNasc}</strong> com a senha <strong>{$this->senha}</strong> com o email <strong>{$this->email}</strong> com endereço <strong>{$this->cidade}, {$this->bairro}, {$this->rua} - {$this->numero} - {$this->complemento}</strong> foi cadastrado com sucesso!";
        }

        public function listar(){
            $conn = new Conn();
            $this->connect =$conn->conectar();

            $queryUsuarios = "SELECT id, nome, email FROM Usuario ORDER BY id DESC LIMIT 40";
            $resultUsuarios = $this->connect->prepare($queryUsuarios);
            $resultUsuarios->execute();
            return $resultUsuarios->fetchALL();
        }
    }
?>