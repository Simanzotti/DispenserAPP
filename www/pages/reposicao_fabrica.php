<?php
$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

mysql_query("DELETE FROM TB_ADM WHERE NOME <> 'Admin';");
mysql_query("TRUNCATE TABLE TB_CADASTRO;");
mysql_query("TRUNCATE TABLE TB_ACESSO;");
mysql_close($con);

header('Location: http://www.dispenserapp.com.br/pages/gerencial.php?repo=9');
?>
   
   
   
 