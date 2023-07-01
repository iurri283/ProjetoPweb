<?php
    include('../classes/conta.php');

    session_start();
    $user = $_SESSION['dadosUser'];
    $conta = $_SESSION['dadosConta'];

    $idUsuario = $user['idUsuario'];
    $saldoConta = $conta['saldoConta'];
    $valorTransferencia = $_POST['valorTransferencia'];

    $conta = new Conta();
    $conta->trasnferir($idUsuario, $saldoConta, $valorTransferencia);

?>