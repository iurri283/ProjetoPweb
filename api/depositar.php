<?php
    include('../classes/conta.php');

    session_start();
    $user = $_SESSION['dadosUser'];
    $idUsuario = $user['idUsuario'];


    $valorDeposito = $_POST['valorDeposito'];

    $conta = new Conta();
    $conta->depositar($idUsuario, $valorDeposito);
?>