<?php
    require('./classes/conta.php');

    session_start();
    $user = $_SESSION['dadosUser'];
    $nomeCompleto = $user['nomeUsuario'];
    $nome = explode(" ", $nomeCompleto);
    $primeiroNome = $nome[0];
    $idUsuario = $_SESSION['idUsuario'];

    $conta = new Conta();
    $conta->depositar($idUsuario);

?>