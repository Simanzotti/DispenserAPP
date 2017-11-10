<?php
$connect = mysql_connect("localhost", "dispense_banco", "788898Iamand") or
die('Não foi possível conectar');

mysql_select_db("dispense_banco", $connect);

$consulta = "SELECT * FROM TB_ADM";

$con = $connect->query($consulta) or die($connect->error);

echo "teste";

mysql_close($connect);
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
                <div class="andre">
				<div class="container">
                    <h2 class="title">Cadastrar um usuário:</h2>
                </div>

				<?php
				$sucesso = $_GET["sucesso"];

				if(!is_null($sucesso) && !empty($sucesso) && $sucesso == 1) {
				?>
					<p>sucesso</p>
				<?php } ?>

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
                            <option value="adm">ADM</option>
                            <option value="usuario">Usuário</option>
                        </select>
                        </div>
                        <div class="item">
                            <button class="botao-cadastrar cadastrar-blue"> <span class="user" style=" width: 28PX;
                                height: 28PX;
                                margin-bottom: -6px;
                                margin-right: 10px;"></span> Cadastrar!</button>
                        </div>
                    </div>
                </form>
				
				
                <br />
                <div class="container">
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
                </div>
				</div>
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