<?php
$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

$date_dia = date("d");
$date_mes = date("m");
$date_ano = date("y");

session_start();
//$teste = $_SESSION['uname'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'unsafe-inline' 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>

<body class="background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="header">
                <div class="logo">Dispenser<span>APP</span></div>
            </div>

            <div class="container form">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-6">
                        <a href="../pages/teste.php" class="button-100 button-2">
                            <img src="../images/icons/settings.svg" class="button__img-2">Gerencial <br /> &nbsp;
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="../pages/cad-removeprod.html" class="button-100 button-2">
                            <img src="../images/icons/barcode.svg" class="button__img-2">Cadastrar/Remover <br /> Produtos
                        </a>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-6">
                        <a href="../pages/listaprod.php" class="button-100 button-2">
                            <img src="../images/icons/list.svg" class="button__img-2">Lista de Produtos <br /> &nbsp;
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="../pages/adm.html" class="button-100 button-2">
                            <img src="../images/icons/envelope-adm.svg" class="button__img-2">Contate o Adm <br /> &nbsp;
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12" id="footer">
                Olá <span class="span--user"><?php echo $_SESSION['uname'] ?></span>, hoje é dia <span class="span--bold"><?php echo $date_dia."/".$date_mes."/".$date_ano?></span>. O produto mais próximo de vencimento é <span class="span--bold">31/12/2017!</span>
            </div>
        </div>
    </div>

    <!-- Sessão scripts -->

    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="scripts/platformOverrides.js"></script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
</body>

</html>