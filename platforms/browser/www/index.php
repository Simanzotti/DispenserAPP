<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'unsafe-inline' 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Dispenserapp</title>
</head>

<body>
    <div class="app">
        <img src="images/cordova_logo.png" class="img-logo" />
        <h1 class="logo">Dispenser<span>APP</span></h1>
        <div id="deviceready" class="blink">
            <p class="event listening">Conectando-se ao Dispositivo</p>
        </div>
        <form name="login">
            <div class="container">

                <div class="item">
                    <label class="form__label">Username:</label>

                    <input class="form__input" type="text" placeholder="Username" name="uname" required>
                </div>

                <div class="item">
                    <label class="form__label">Password:</label>

                    <input type="password" class="form__input" placeholder="Senha" name="psw" required>
                </div>

                <div class="item">
                    <button class="botao-acessar" type="button" onClick="loginUsuario()"> <span class="key" style=" width: 28PX;
                        height: 28PX;
                        margin-bottom: -6px;
                        margin-right: 10px;"></span> Login</button>
                </div>

                <div class="item">
                    <input type="checkbox" checked="checked"> Lembrar-me
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="scripts/platformOverrides.js"></script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
</body>

</html>