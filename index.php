<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>CEFET MONEY</title>
</head>
<body>
    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="">Home</a>
            <a href="">Sobre</a>
            <a href="">Contato</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icone-fechar">
            <ion-icon name="close"></ion-icon>
        </span>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" required>
                    <label>Senha</label>
                </div>
                <div class="lembrar-esquecer">
                    <label>
                        <input type="checkbox"> Lembre-me
                    </label>
                    <a href="#">Esqueceu sua senha?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-registrar">
                    <p>Ainda não tem uma conta? <a href="#" class="link-registrar">Registre-se</a></p>
                </div>
            </form>
        </div>

        <div class="form-box registrar">
            <h2>Registro</h2>
            <form action="">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" required>
                    <label>Nome</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" required>
                    <label>Senha</label>
                </div>
                <div class="lembrar-esquecer">
                    <label>
                        <input type="checkbox"> Concordo com termos e políticas
                    </label>
                </div>
                <button type="submit" class="btn">Cadastrar</button>
                <div class="login-registrar">
                    <p>Já tem uma conta? <a href="#" class="link-login">Login</a></p>
                </div>
            </form>
        </div>
    </div>


    <script src="./scripts/login-registrar.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>