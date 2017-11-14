<?php
$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

$sql = mysql_query("select NM_PROD, 
                          CONCAT(RIGHT(cast(DT_VALIDADE as date),2),\"/\",SUBSTRING(cast(DT_VALIDADE as date),6,2),\"/\",LEFT(cast(DT_VALIDADE as date),4)) as 'DATA'
                            from TB_CADASTRO
                            where DT_VALIDADE > now()
                            LIMIT 1;
                            ");

while($d = mysql_fetch_array($sql)){
    $nome_prod = $d['NM_PROD'];
    $dt_validade = $d['DATA'];
}

$date_dia = date("d");
$date_mes = date("m");
$date_ano = date("y");

session_start();
?>
<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'unsafe-inline' 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/gerencial.css">
    <style type="text/css">
        a:link
        {
            text-decoration:none;
        }
    </style>
</head>

<body class="background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="header">
                <a href="../pages/home.php">
                    <div class="logo">Dispenser<span>APP</span></div>
                </a>
            </div>

            <div class="container form" id="cadastro" style="min-height: calc(100vh - 166px);">
                <div class="col-12 contato">
                    <p>
                        <img src="../images/icons/facebook-logo.svg" class="contato__img"> <a href="https://www.facebook.com/finaltec/" class="link" target="_blank">https://www.facebook.com/finaltec/</a>
                    </p>
                </div>

                <div class="col-12 contato">
                    <p>
                        <img src="../images/icons/call-answer.svg" class="contato__img"> <a href="tel:+1199999999" class="link"> (11) 99999-9999 </a>
                    </p>
                </div>

                <div class="col-12 contato">
                    <div class="item">
                        <label class="form__label">Usuário:</label>
                        <input class="form__input" type="text" placeholder="Usuário" name="unamemail" required>
                    </div>
                    <div class="item">
                        <label class="form__label">Assunto:</label>
                        <input class="form__input" type="text" placeholder="Senha" name="psw" required>
                    </div>
                    <div class="item">
                        <label class="form__label">Comentários:</label>
                        <textarea class="form__label" maxlength="8000"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-12" id="footer">
                Olá <span class="span--user"><?php echo $_SESSION['uname'] ?></span>, hoje é dia <span class="span--user"><?php echo $date_dia."/".$date_mes."/".$date_ano?></span>. O produto <span class="span--user"><?php echo $nome_prod ?></span> está próximo de vencer, com a data de validade <span class="span--user"><?php echo $dt_validade ?></span>
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