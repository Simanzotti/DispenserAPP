<?php
$editar = $_GET["id_prod"];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
die('Não foi possível conectar');

mysql_select_db("dispense_banco", $con);
mysql_query("DELETE FROM TB_CADASTRO WHERE ID_PROD='$editar'");
mysql_close($con);

header('Location: http://www.dispenserapp.com.br/pages/listaprod.php?sucesso=2');
?>