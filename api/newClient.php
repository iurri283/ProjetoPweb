<?php

require("../classes/usuario.php");

$nome = $_POST['nomeCompleto'];
$cpf = $_POST['cpf'];
$dataNasc = $_POST['dataNascimento'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

$usu = new Usuario();
$usu->cadastrar($nome, $cpf, $dataNasc, $email, $senha, $cidade, $bairro, $rua, $numero, $complemento);

?>