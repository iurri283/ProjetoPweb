<?php

require("../classes/usuario.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$usu = new Usuario();
$usu->login($cpf, $senha);

?>