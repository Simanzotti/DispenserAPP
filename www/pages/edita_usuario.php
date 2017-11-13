<?php
$editar = $_POST["oculto"];
$nome = $_POST['uname'];
$perfil = $_POST['perfil'];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
      die('Não foi possível conectar');
   
   mysql_select_db("dispense_banco", $con);
   mysql_query("UPDATE TB_ADM SET NOME = '$nome', PERFIL = '$perfil' WHERE NOME='$editar'");
   mysql_close($con);
   
header('Location: http://www.dispenserapp.com.br/pages/gerencial.php');
// require_once();
?>
   
   
   
 