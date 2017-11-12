<?php
$nome = $_POST['uname'];
$senha = $_POST['psw'];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
      die('Não foi possível conectar');

mysql_select_db("dispense_banco", $con);
$sql = mysql_query("SELECT * FROM TB_ADM WHERE NOME = '$nome' AND SENHA = '$senha'") or die(mysqli_error());
$row = mysql_num_rows($sql);
mysql_close($con);

if($row > 0){
    session_start();
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['psw'] = $_POST['psw'];
    header('Location: http://www.dispenserapp.com.br/pages/home.php');
} else{
    header('Location: http://www.dispenserapp.com.br/erro_login.php');
}

?>

