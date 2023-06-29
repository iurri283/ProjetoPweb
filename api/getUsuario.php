<?php
    session_start();

    // Verifique se o usuário está autenticado
    if (isset($_SESSION['dadosUser'])) {
        // Acesso aos dados do usuário
        $user = $_SESSION['dadosUser'];
    
        $nomeCompleto = $user['nomeUsuario'];
        $nome = explode(" ", $nomeCompleto);
        $primeiroNome = $nome[0];
    
        $cpf = $user['cpfUsuario'];
        $dataBanco = $user['nascUsuario'];
        $dataNascimento = date("d/m/Y", strtotime($dataBanco));
        $email = $user['emailUsuario'];
    
        //--------------------------------##--Dados Lozalização--##-----------------------------------
    
        // $estado = $use['estadoUsuario'];
        $cidade = $user['cidadeUsuario'];
        $bairro = $user['bairroUsuario'];
        $rua = $user['ruaUsuario'];
        $numero = $user['numeroUsuario'];
        $complemento = $user['compleUsuario'];

        
    
    
    } else {
        // Usuário não está autenticado, redirecione para a página de login
        header("Location: ./index.php");
        exit();
    }
?>