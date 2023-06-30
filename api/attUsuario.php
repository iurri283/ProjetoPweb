<?php

require("../classes/usuario.php");

$nome = $_POST['nomeCompleto'];
$cpf = $_POST['cpf'];
$data = $_POST['dataNascimento'];
$dataFormatada = date("Y/m/d", strtotime(str_replace("/", "-", $data)));
$email = $_POST['email'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];


$usu = new Usuario();
$retorno = $usu->editar($nome, $cpf, $dataFormatada, $email, $cidade, $bairro, $rua, $numero, $complemento);

if($retorno == 200){
    echo "<script>alert('Usuário atualizado com sucesso!');window.location.href = '../perfil.php';</script>";
}
?>