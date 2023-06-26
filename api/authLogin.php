<?php

require("../classes/usuario.php");

session_start();

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$usu = new Usuario();
$usuario = $usu->login($cpf, $senha)->fetch(PDO::FETCH_ASSOC);

if($cpf && password_verify($senha, $usuario['senha']))
{
    header('Location: ../home.php');
    exit();
}else
{
    echo "erro";
}

?>