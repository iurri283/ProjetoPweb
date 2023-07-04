<?php
    require('./api/getConta.php');
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
    <script src="./scripts/mostrarEsconderSaldo.js"></script>
    <title>Dados da conta</title>
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
            <form action="#" class="row col-md-9 col-xl-10 py-3 d-flex justify-content-center align-items-center containerCards vh-100">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 d-flex align-items-stretch">
                    <div class="card" style="height: 350px;">
                        <div class="card-body text-justify">
                            <h2 class="card-title">Dados da Conta</h2>
                            <hr>
                            <strong>Agência: </strong><input type="text" class="card-input" value="<?php echo $agencia ?>" readonly>
                            <strong>Número: </strong><input type="text" id="card-input" value="<?php echo $numeroConta ?>" readonly>
                            <strong>Saldo: </strong><input type="text" class="card-input" value="R$ <?php echo $saldo ?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>