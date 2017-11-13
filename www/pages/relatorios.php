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

while($n = mysql_fetch_array($sql)){
    $nome_prod = $n['NM_PROD'];
    $dt_validade = $n['DATA'];
}

$date_dia = date("d");
$date_mes = date("m");
$date_ano = date("y");

session_start();

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

            <div class="container form">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-6">
                        <a href="../pages/rel_vencimentos.php" class="button-100 button-2">
                            <img src="../images/icons/relatorio2.svg" class="button__img-2">Produtos vencidos/não vencidos <br /> &nbsp;
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="../pages/rel_tp_produto.php" class="button-100 button-2">
                            <img src="../images/icons/relatorio2.svg" class="button__img-2">Tipo de produtos <br /> &nbsp;
                        </a>
                    </div>
                </div>
            </div>
            <div class="container form">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-6">
                        <a href="../pages/rel_cad_data.php" class="button-100 button-2">
                            <img src="../images/icons/relatorio2.svg" class="button__img-2">Cadastrados por data <br /> &nbsp;
                        </a>
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