<?php
$nome_prod = $_POST['prod-name'];
$tp_prod = $_POST['prod-tipo'];
$cod_prod = $_POST['prod-cod'];
$data_validade_prod = $_POST['data-validade'];


$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
      die('Não foi possível conectar');
   
   mysql_select_db("dispense_banco", $con);
   mysql_query("INSERT INTO TB_CADASTRO (NM_PROD,TP_PRODUTO,CD_BARRAS,DT_VALIDADE,DT_CADASTRO) VALUES ('$nome_prod', '$tp_prod', '$cod_prod','$data_validade_prod', now())");
   mysql_close($con);
   
header('Location: http://www.dispenserapp.com.br/pages/cadastrar-produto.php?sucesso=1');
// require_once();
?>
   
   
   
 