<?php
//include ("pages/conexao.php");

$editar = $_GET["nome"];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
die('Não foi possível conectar');

mysql_select_db("dispense_banco", $con);
mysql_query("DELETE FROM TB_ADM WHERE NOME='$editar'");
mysql_close($con);

header('Location: http://www.dispenserapp.com.br/pages/gerencial.php');
?>