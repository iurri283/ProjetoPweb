<?php
    include('./classes/conta.php');
    session_start();
    $user = $_SESSION['dadosUser'];
    $nomeCompleto = $user['nomeUsuario'];
    $nome = explode(" ", $nomeCompleto);
    $primeiroNome = $nome[0];

    $conta = new Conta();
    $conta->getConta($user['idUsuario']);

    $dadosConta = $_SESSION['dadosConta'];

    $agencia = $dadosConta['agConta']; 
    $numeroConta = $dadosConta['numeroConta'];
    $saldo = $dadosConta['saldoConta'];
?>