<?php
    include('./api/getUsuario.php');
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
    <script src="./scripts/habilitaInputs.js"></script>
    <script src="./scripts/mascaraCPF.js"></script>
    <script src="./scripts/mostrarEsconderSaldo.js"></script>
    <title>Transferência</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php
                require('./components/sideMenu.php');
            ?>
            <?php
                require('./components/saldoCantoSuperior.php');
            ?>
            <form action="./api/transferir.php" method="POST" class="row col-md-9 col-xl-10 py-3 d-flex justify-content-center align-items-center containerCards vh-100">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 d-flex align-items-stretch">
                    <div class="card" style="height: 250px;">
                        <div class="card-body text-justify">
                            <h2 class="card-title">Área de Transferência</h2>
                            <hr>
                            <strong>CPF: </strong>
                            <input type="text" name="cpf" placeholder="digite o CPF do usuário" class="card-input" maxlength="14" OnKeyPress="formatar('###.###.###-##',this)">
                            
                            <strong>Valor da transferência: </strong>
                            <input type="text" name="valorTransferencia" placeholder="digite o valor a ser transferido" id="moneyInput" class="card-input">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <!-- <button class="btn btn-primary" type="button" onclick="habilitarInputs()"><strong>Editar</strong></button> -->
                    <button class="btn btn-primary" type="submit"><strong>Transferir</strong></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>