<?php
$nome = $_POST['uname'];
$senha = $_POST['psw'];
$perfil = $_POST['perfil'];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
      die('Não foi possível conectar');
   
   mysql_select_db("dispense_banco", $con);
   mysql_query("INSERT INTO TB_ADM (NOME,SENHA,PERFIL) VALUES ('$nome', '$senha', '$perfil')");
   mysql_close($con);
   
header('Location: http://www.dispenserapp.com.br/pages/gerencial.php?sucesso=1'); 
// require_once();
?>
   
   
   
 