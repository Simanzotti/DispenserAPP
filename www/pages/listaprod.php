<?php
$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

$sql = mysql_query("SELECT NM_PROD
	 ,TP_PRODUTO
     ,CONCAT(RIGHT(cast(DT_VALIDADE as date),2),\"/\",SUBSTRING(cast(DT_VALIDADE as date),6,2),\"/\",LEFT(cast(DT_VALIDADE as date),4)) as 'DT_VALIDADE' 
     ,VALIDO
     ,ID_PROD FROM TB_CADASTRO ORDER BY DT_VALIDADE DESC;");

$sql_footer = mysql_query("select NM_PROD, 
                          CONCAT(RIGHT(cast(DT_VALIDADE as date),2),\"/\",SUBSTRING(cast(DT_VALIDADE as date),6,2),\"/\",LEFT(cast(DT_VALIDADE as date),4)) as 'DATA'
                            from TB_CADASTRO
                            where DT_VALIDADE > now()
                            LIMIT 1;
                            ");

$sql_filtro_anomes = mysql_query("select distinct DT_CADASTRO as 'parametro',
 CONCAT(RIGHT(cast(DT_VALIDADE as date),2),\"/\",SUBSTRING(cast(DT_VALIDADE as date),6,2),\"/\",LEFT(cast(DT_VALIDADE as date),4)) as 'anomesdia' from TB_CADASTRO;");

while($anomes = mysql_fetch_array($sql_filtro_anomes)){
    $anomesdia = $anomes['anomesdia'];
    $parametros = $anomes['parametro'];
}

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
            <div class="container">
                <h2 class="title">Veja os produtos já cadastrados por data:</h2>

                <br>
                <form name="lista-produtos" action="lista_filtro_prod.php?parametro=<?php echo $parametros ?>" method="POST">
                    <div class="item">
                        <label class="form__label">Data:</label>
                        <select name="filtro">
                            <option value="<?php echo $parametros ?>"><?php echo $anomesdia ?></option>
                        </select>
                    </div>
                    <div class="item">
                        <button class="botao-cadastrar cadastrar-blue"><span class="search" style=" width: 28PX;
                                    height: 28PX;
                                    margin-bottom: -6px;
                                    margin-right: 10px;"></span> Listar </button>
                    </div>
                </form>
                <?php
                $sucesso = $_GET["sucesso"];

                if(!is_null($sucesso) && !empty($sucesso) && $sucesso == 2) {
                    ?>
                    <div class="item">
                        <label class="form__label">Produto excluído com sucesso!</label>
                    </div>
                <?php } ?>
                <br>

                <table class="table" id="cor-letra">
                    <tr>
                        <td><b>Nome produto</b></td>
                        <td><b>Tipo Produto</b></td>
                        <td><b>Data de validade</b></td>
                        <td><b>Posso consumir?</b></td>
                        <?php $mostra_td = $_SESSION['perfil'];
                        if(!is_null($mostra_td) && !empty($mostra_td) && $mostra_td == 'Administrador'){
                            ?>
                            <td><b>Ação</b></td>
                        <?php }?>
                    </tr>
                    <?php while($n = mysql_fetch_array($sql)){?>
                    <tr>
                        <td><?php echo $n["NM_PROD"]; ?></td>
                        <td><?php echo $n["TP_PRODUTO"]; ?></td>
                        <td><?php echo $n["DT_VALIDADE"]; ?></td>
                        <td><?php echo $n["VALIDO"]; ?></td>
                        <?php $mostra_td = $_SESSION['perfil'];
                        if(!is_null($mostra_td) && !empty($mostra_td) && $mostra_td == 'Administrador'){
                        ?>
                        <td><a href="editar_prod_interface.php?id_prod=<?php echo $n["ID_PROD"]; ?>"> Editar </a> |
                            <a href="excluir_prod.php?id_prod=<?php echo $n["ID_PROD"]; ?>">Excluir </a>
                        </td>
                        <?php }?>
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