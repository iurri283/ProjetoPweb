<?php
    include('../classes/conta.php');

    session_start();
    $user = $_SESSION['dadosUser'];
    $idUsuario = $user['idUsuario'];


    $valorSaque = $_POST['valorSaque'];

    $conta = new Conta();
    $conta->sacar($idUsuario, $valorSaque);
?>