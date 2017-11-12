<?php
//include ("pages/conexao.php");

$servidor = "localhost";
$nome_usuario = "dispense_banco";
$senha_usuario = "788898Iamand";
$nome_do_banco = "dispense_banco";
$conecta = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario") or die (mysql_error());
mysql_select_db("$nome_do_banco",$conecta) or die (mysql_error());

$sql = mysql_query("SELECT NOME, PERFIL FROM TB_ADM ORDER BY NOME");


$tipo_usu = "ff";

?>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/gerencial.css">
</head>

<body class="background">

<div class="container-fluid">
    <div class="row">
        <div class="col-12" id="header">
            <div class="logo">Dispenser<span>APP</span></div>
        </div>

        <div class="col-12" id="cadastro">
                <div class="container">
                    <h2 class="title">Cadastrar um usuário:</h2>
                </div>
                <form name="cad-usuario" action="form_gerencial.php" method="POST">
                    <div class="container">

                        <div class="item">
                            <label class="form__label">Usuário:</label>
                            <input class="form__input" type="text" placeholder="Usuário" name="uname" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Senha:</label>
                            <input class="form__input" type="password" placeholder="Senha" name="psw" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Perfil:</label>
                            <select name="perfil">
                                <option value="Administrador">Administrador</option>
                                <option value="Usuario">Usuário</option>
                            </select>
                        </div>
                        <div class="item">
                            <button class="botao-cadastrar cadastrar-blue"> <span class="user" style=" width: 28PX;
                                height: 28PX;
                                margin-bottom: -6px;
                                margin-right: 10px;"></span> Cadastrar!</button>
                        </div>
                        <?php
                        $sucesso = $_GET["sucesso"];

                        if(!is_null($sucesso) && !empty($sucesso) && $sucesso == 1) {
                            ?>
                            <div class="item">
                                <label class="form__label">Usuário cadastrado com sucesso!</label>
                            </div>
                        <?php } ?>
                    </div>
                </form>

            <div class="container">
                <h2 class="title">Veja os usuário já cadastrados:</h2>
                <table class="table" id="cor-letra">
                    <tr>
                        <td><b>Nome</b></td>
                        <td><b>Nível de acesso</b></td>
                        <td><b>Ação</b></td>
                    </tr>
                    <?php while($n = mysql_fetch_array($sql)){ ?>
                        <tr>
                            <td><?php echo $n["NOME"]; ?></td>
                            <td><?php echo $n["PERFIL"]; ?></td>
                            <td><a href="editar.php?nome=<?php echo $n["NOME"]; ?>"> Editar Usuário </a> |
                                <a href="excluir_usu.php?nome=<?php echo $n["NOME"]; ?>">Excluir Usuário </a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
                <!--<div class="container">
                    <h2 class="title">Deletar usuário:</h2>
                    <div class="item">
                        <label class="form__label"></label>
                        <select>
                            <option value="marcel">Marcel</option>
                            <option value="marcos">Marcos</option>
                            <option value="rodolfo"></option>
                            <option value="anderson">Anderson</option>
                        </select>
                    </div>
                    <div class="item">
                        <button class="botao-cadastrar cadastrar-blue"> <span class="delete" style=" width: 28PX;
                            height: 28PX;
                            margin-bottom: -6px;
                            margin-right: 10px;"></span> Deletar usuário!</button>
                    </div>
                </div> -->
        </div>

        <div class="col-12" id="footer">
            Olá <span class="span--user">ADM</span>, hoje é dia <span class="span--bold">16/10/2017!</span> O produto mais próximo de vencimento é <span class="span--bold">31/12/2017!</span>
        </div>
    </div>
</div>


<!-- Sessão scripts -->

<script type="text/javascript" src="cordova.js"></script>
<script type="text/javascript" src="scripts/platformOverrides.js"></script>
<script type="text/javascript" src="scripts/index.js"></script>
<script type="text/javascript" src="scripts/login.js"></script>
</body>

</html>