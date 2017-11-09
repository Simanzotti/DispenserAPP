<?php
$conecta = mysql_connect("localhost", "dispense_banco", "788898Iamand") or print (mysql_error());
mysql_select_db("dispense_banco", $conecta) or print(mysql_error());
print "Conexão e Seleção OK!";
mysql_close($conecta);

?>

