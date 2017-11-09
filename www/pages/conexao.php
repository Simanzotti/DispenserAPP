<?php
$host = "localhost";
$usuario = "dispense_banco";
$senha = "788898Iamand";
$bd = "dispense_banco";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
        echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
?>

