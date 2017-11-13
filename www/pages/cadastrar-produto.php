﻿<?php
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

<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'unsafe-inline' 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/gerencial.css">
    <link rel="stylesheet" type="text/css" href="../css/cadastrar-prod.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body class="background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="header">
                <div class="logo">Dispenser<span>APP</span></div>
            </div>

            <div class="col-12 form" id="cadastro">
                <div class="container">
                    <h2 class="title">Cadastrar um produto manual:</h2>
                </div>
                <form name="cad-prod" action="form_cadastro_prod.php" method="POST">
                    <div class="container">
                        <div class="item">
                            <label class="form__label">Nome:</label>
                            <input type="text" class="form__input" name="prod-name" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Tipo do produto:</label>
                            <input type="text" class="form__input" name="prod-tipo" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Código de Barras:</label>
                            <input type="text" class="form__input" name="prod-cod" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Data de validade:</label>
                            <input type="text" class="form__input" id="datavalidade" name="data-validade" required>
                        </div>
                        <div class="item">
                            <button class="botao-cadastrar cadastrar-blue"><span class="add" style=" width: 28PX;
                                height: 28PX;
                                margin-bottom: -6px;
                                margin-right: 10px;"></span> Cadastrar Produto!</button>
                        </div>
                        <?php
                        $sucesso = $_GET["sucesso"];

                        if(!is_null($sucesso) && !empty($sucesso) && $sucesso == 1) {
                            ?>
                            <div class="item">
                                <label class="form__label">Produto cadastrado com sucesso! Acesse a lista de produtos para ve-lo!</label>
                            </div>
                        <?php } ?>
                    </div>
                </form>
                <div class="container">
                    <div class="item">
                        <h2 class="title">Obtenha os dados cadastrais do produto via celular:</h2>
                    </div>

                    <div class="item">
                        <button class="botao-cadastrar"> <span class="camera" style=" width: 28PX;
                            height: 28PX;
                            margin-bottom: -6px;
                            margin-right: 10px;"></span> Usar camera do celular para leitura do código de barras!</button>
                    </div>
                </div>
            </div>

            <div class="col-12" id="footer">
                Olá <span class="span--user"><?php echo $_SESSION['uname'] ?></span>, hoje é dia <span class="span--user"><?php echo $date_dia."/".$date_mes."/".$date_ano?></span>. O produto <span class="span--user"><?php echo $nome_prod ?></span> está próximo de vencer, com a data de validade <span class="span--user"><?php echo $dt_validade ?></span>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="scripts/platformOverrides.js"></script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrap-datepicker.pt-BR.min.js"></script>
</body>

</html>