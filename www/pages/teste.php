<?php
include ("pages/conexao.php");

$consulta = "SELECT NOME FROM TB_ADM";

$con = $mysqli->query($consulta) or die($mysqli->error);
?>

<html>
    <head>
        <meta charset="utf8">
    </head>
    <body>
        <table>
            <tr>
                <td>Nome</td>
                <td>Senha</td>
                <td>Perfil</td>
            </tr>
            <?php while ($dado = $con->fetch_array()){ ?>
                <tr>
                    <td><?php echo $dado["NOME"]; ?></td>
                    <td><?php echo $dado["SENHA"]; ?></td>
                    <td><?php echo $dado["PERFIL"]; ?></td>
                </tr>
            <?php }?>
        </table>
    </body>
</html>