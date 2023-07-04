<?php
    include('../classes/conta.php');

    session_start();
    $user = $_SESSION['dadosUser'];
    $conta = $_SESSION['dadosConta'];

    $idUsuario = $user['idUsuario'];
    $saldoConta = $conta['saldoConta'];
    $valorTransferencia = $_POST['valorTransferencia'];
    $cpfDestino = $_POST['cpf'];

    $conta = new Conta();
    $conta->transferir($idUsuario, $saldoConta, $valorTransferencia, $cpfDestino);

?>