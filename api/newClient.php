<?php

include("../classes/usuario.php");

$usu = new Usuario();
$result = $usu->cadastrar($_POST['nomeCompleto'],$_POST['cpf'],$_POST['dataNascimento'],$_POST['senha'],$_POST['email'],$_POST['cidade'],$_POST['bairro'],$_POST['rua'],$_POST['numero'],$_POST['complemento']);

echo $result;

?>