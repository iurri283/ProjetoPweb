<?php
    require('../classes/usuario.php');
    session_start();
    $user = $_SESSION['dadosUser'];

    $usu = new Usuario();
    $usu->getConta

?>