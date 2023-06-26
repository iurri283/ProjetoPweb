<?php
    class Conn{
        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $dbname = "cefetmoney";

        public function conectar(){
            try
            {
                $this->connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);

                return $this->connect;
            }catch(Exception $err)
            {
                echo "Erro: Conexão não realizada com sucesso!".$err;
                return false;
            }
        }
    }
?>