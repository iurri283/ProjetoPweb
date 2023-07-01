
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0  sideMenu">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">CEFET MONEY</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="bi bi-coin fs-4"></i> <span class="ms-1 d-none d-sm-inline">Conta</span> </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li>
                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Transferir</span></a>
                    </li>
                    <li>
                        <a href="./saque.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Saque</span></a>
                    </li>
                    <li>
                        <a href="./deposito.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Depósito</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi bi-file-earmark-pdf-fill"></i> <span class="ms-1 d-none d-sm-inline">Extrato</span>
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-sm-inline mx-1">Olá, <?php echo $primeiroNome?></span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="./home.php">Dados da conta</a></li>
                <li><a class="dropdown-item" href="./perfil.php">Dados Pessoais</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</div>