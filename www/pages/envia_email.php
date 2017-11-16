<?php
session_start();
$usuario = $_SESSION['uname'];
$assunto = $_POST['assunto'];
$mensagem_sql = $_POST['mensagem'];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
die('Não foi possível conectar');

mysql_select_db("dispense_banco", $con);
mysql_query("INSERT INTO TB_EMAIL (USUARIO,ASSUNTO,EMAIL) VALUES ('$usuario', '$assunto', '$mensagem_sql'");
mysql_close($con);

//1 – Definimos Para quem vai ser enviado o email
$para = "contato@dispenserapp.com.br";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_SESSION['uname'];
//4 – Agora definimos a  mensagem que vai ser enviado no e-mail
$mensagem = "<strong>Nome:  </strong>".$nome;
$mensagem .= "<br>  <strong>Mensagem: </strong>".$_POST['mensagem'];

//5 – agora inserimos as codificações corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  dispenserapp.com.br<contato@dispenserapp.com.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <contato@dispenserapp.com.br>\n"; //email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <contato@dispenserapp.com.br>\n"; //caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";

mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.

?>
<script>
    window.setTimeout(function () {
        window.location.href="http://www.dispenserapp.com.br/pages/adm.php?sucesso=20";
    },200);
</script>
