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
                Olá <span class="span--user">ADM</span>, hoje é dia <span class="span--bold">16/10/2017!</span> O produto mais próximo de vencimento é <span class="span--bold">31/12/2017!</span>
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