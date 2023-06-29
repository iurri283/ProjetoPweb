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
} else {
    // Usuário não está autenticado, redirecione para a página de login
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/bitcoin-aceito.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styleHome.css">
    <title>Perfil</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
                require('./components/sideMenu.php');
            ?> 
            <div class="container">
                <div class="row custom-row py-3 justify-content-center">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title">Dados Pessoais</h2>
                                <p class="card-text text-wrap"><strong>Nome:</strong> John Doe</p>
                                <p class="card-text text-wrap"><strong>CPF:</strong> 123.456.789-00</p>
                                <p class="card-text text-wrap"><strong>Email:</strong> johndoe@example.com</p>
                                <p class="card-text text-wrap"><strong>Data de Nascimento:</strong> 01/01/1990</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title">Dados do Endereço</h2>
                                <p class="card-text text-wrap"><strong>Estado:</strong> São Paulo</p>
                                <p class="card-text text-wrap"><strong>Cidade:</strong> São Paulo</p>
                                <p class="card-text text-wrap"><strong>Bairro:</strong> Centro</p>
                                <p class="card-text text-wrap"><strong>Rua:</strong> Avenida Paulista</p>
                                <p class="card-text text-wrap"><strong>Número:</strong> 123</p>
                                <p class="card-text text-wrap"><strong>Complemento:</strong> Apto 456</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>