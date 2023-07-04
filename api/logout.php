<?php
    // logout.php

    // Inicie a sessão
    session_start();

    // Limpe todas as variáveis de sessão (opcional, dependendo das suas necessidades)
    $_SESSION = array();

    // Destrua a sessão
    session_destroy();

    // Redirecione para a página de login ou página inicial
    echo "<script>window.location.href = '../index.php';</script>";
    exit();
?>