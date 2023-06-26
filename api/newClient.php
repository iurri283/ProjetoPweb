<?php

require("../classes/usuario.php");

$nome = $_POST['nomeCompleto'];
$cpf = $_POST['cpf'];
$data = $_POST['dataNascimento'];
$dataFormatada = date("Y/m/d", strtotime(str_replace("/", "-", $data)));
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

$usu = new Usuario();
$usu->cadastrar($nome, $cpf, $dataFormatada, $email, $senha, $cidade, $bairro, $rua, $numero, $complemento);

?>