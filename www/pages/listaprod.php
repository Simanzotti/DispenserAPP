﻿<?php
$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

$sql = mysql_query("SELECT NM_PROD
	 ,TP_PRODUTO
     ,DT_VALIDADE 
     ,VALIDO
     ,ID_PROD FROM TB_CADASTRO ORDER BY DT_VALIDADE DESC;");

$sql_footer = mysql_query("select NM_PROD, 
                          CONCAT(RIGHT(cast(DT_VALIDADE as date),2),\"/\",SUBSTRING(cast(DT_VALIDADE as date),6,2),\"/\",LEFT(cast(DT_VALIDADE as date),4)) as 'DATA'
                            from TB_CADASTRO
                            where DT_VALIDADE > now()
                            LIMIT 1;
                            ");

while($n = mysql_fetch_array($sql_footer)){
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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/gerencial.css">
</head>

<body class="background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="header">
                <div class="logo">Dispenser<span>APP</span></div>
            </div>
            <div class="container">
                <h2 class="title">Veja os produtos já cadastrados:</h2>
                <br>
                <table class="table" id="cor-letra">
                    <tr>
                        <td><b>Nome produto</b></td>
                        <td><b>Tipo Produto</b></td>
                        <td><b>Data de validade</b></td>
                        <td><b>Posso consumir?</b></td>
                        <td><b>Ação</b></td>
                    </tr>
                    <?php while($n = mysql_fetch_array($sql)){?>
                    <tr>
                        <td><?php echo $n["NM_PROD"]; ?></td>
                        <td><?php echo $n["TP_PRODUTO"]; ?></td>
                        <td><?php echo $n["DT_VALIDADE"]; ?></td>
                        <td><?php echo $n["VALIDO"]; ?></td>
                        <td><a href="editar_prod_interface.php?id_prod=<?php echo $n["ID_PROD"]; ?>"> Editar </a> |
                            <a href="excluir_prod.php?id_prod=<?php echo $n["ID_PROD"]; ?>">Excluir </a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
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