<?php
    require("../classes/usuario.php");
    session_start();
    $user = $_SESSION['dadosUser'];
    $idUsuario = $user['idUsuario'];

    $usu = new Usuario();
    $retorno = $usu->deletar($idUsuario);

    if($retorno == 200){
        echo "<script>alert('Usuário deletado com sucesso!');</script>";

        // Limpe todas as variáveis de sessão (opcional, dependendo das suas necessidades)
        $_SESSION = array();

        // Destrua a sessão
        session_destroy();

        // Redirecione para a página de login ou página inicial
        echo "<script>window.location.href = '../index.php';</script>";
        exit();
    }
    ?>
?>