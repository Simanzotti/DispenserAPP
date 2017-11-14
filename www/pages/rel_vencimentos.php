<?php
$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

$sql_footer = mysql_query("select NM_PROD, 
                          CONCAT(RIGHT(cast(DT_VALIDADE as date),2),\"/\",SUBSTRING(cast(DT_VALIDADE as date),6,2),\"/\",LEFT(cast(DT_VALIDADE as date),4)) as 'DATA'
                            from TB_CADASTRO
                            where DT_VALIDADE > now()
                            LIMIT 1;
                            ");
$sql_qnt_valido = mysql_query("SELECT COUNT(VALIDO) as 'valido' FROM TB_CADASTRO WHERE VALIDO = 'Produto Vencido!'");
$sql_qnt_naovalidos = mysql_query("SELECT COUNT(VALIDO) as 'nvalido' FROM TB_CADASTRO WHERE VALIDO = 'Produto Consumivel'");

while($r = mysql_fetch_array($sql_qnt_valido)){
    $qnt_valido = $r['valido'];
}
while($f = mysql_fetch_array($sql_qnt_naovalidos)){
    $qnt_naovalido = $f['nvalido'];
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
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <h2 class="title">Veja abaixo a proporção de data de validade:</h2>
                        <br>
                    </div>
                </div>
            </div>
            <div class="container" style="min-height: calc(100vh - 166px);">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div id="piechart" style="width: 500px; height: 400px; fill: #1C232D"></div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="footer">
                Olá <span class="span--user"><?php echo $_SESSION['uname'] ?></span>, hoje é dia <span class="span--user"><?php echo $date_dia."/".$date_mes."/".$date_ano?></span>. O produto <span class="span--user"><?php echo $nome_prod ?></span> está próximo de vencer, com a data de validade <span class="span--user"><?php echo $dt_validade ?></span>
            </div>
        </div>
    </div>

    <!-- Sessão scripts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Consumível?', 'Quantidade'],
                ['Produto Vencido!', <?php echo $qnt_valido ?>],
                ['Produto Consumivel\n', <?php echo $qnt_naovalido ?>]
            ]);

            var options = {
                title: '% Produtos consumíveis ou não',
                backgroundColor: 'transparent',
                titleTextStyle: {color: '#fff'},
                legend: {textStyle: {color: '#fff'}},
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
</body>

</html>