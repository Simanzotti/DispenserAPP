<?php
$nome = $_POST['uname'];
$senha = $_POST['psw'];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
      die('Não foi possível conectar');

mysql_select_db("dispense_banco", $con);
$sql = mysql_query("SELECT * FROM TB_ADM WHERE NOME = '$nome' AND SENHA = '$senha'") or die(mysqli_error());
while($n = mysql_fetch_array($sql)){
    $perfil_usu = $n['PERFIL'];
}
$row = mysql_num_rows($sql);


if($row > 0){
    session_start();
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['psw'] = $_POST['psw'];
    $_SESSION['perfil'] = $perfil_usu;
    mysql_query("INSERT INTO TB_ACESSO (USUARIO,DT_ACESSO) VALUES ('$nome', now())");
    header('Location: http://www.dispenserapp.com.br/pages/home.php');
} else{
    header('Location: http://www.dispenserapp.com.br/erro_login.php');
}
mysql_close($con);
?>

