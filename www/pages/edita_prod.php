<?php
$editar = $_POST["oculto"];
$nome_prod = $_POST['prod-name'];
$tp_prod = $_POST['prod-tipo'];
$cod_prod = $_POST['prod-cod'];
$data_validade_prod = $_POST['data-validade'];

$con = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
      die('Não foi possível conectar');
   
   mysql_select_db("dispense_banco", $con);
   mysql_query("UPDATE TB_CADASTRO 
                      SET NM_PROD = '$nome_prod'
                         ,TP_PRODUTO = '$tp_prod'
                         ,CD_BARRAS = '$cod_prod'
                         ,DT_VALIDADE = '$data_validade_prod'                           
                      WHERE ID_PROD='$editar'");
    mysql_query("UPDATE TB_CADASTRO SET VALIDO = 'Produto Vencido!' WHERE DT_VALIDADE < now()");
    mysql_query("UPDATE TB_CADASTRO SET VALIDO = 'Produto Consumivel' WHERE DT_VALIDADE >= now()");
   mysql_close($con);
   
header('Location: http://www.dispenserapp.com.br/pages/editar_prod_interface.php?sucesso=3');
// require_once();
?>
   
   
   
 