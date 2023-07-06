<?php
    require("../classes/usuario.php");
    
    $user = $_SESSION['dadosUser'];
    $idUsuario = $user['idUsuario'];

    $usu = new Usuario();
    $usu->deletar($idUsuario);
?>