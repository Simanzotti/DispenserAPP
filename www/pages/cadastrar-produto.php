<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'unsafe-inline' 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/gerencial.css">
    <link rel="stylesheet" type="text/css" href="../css/cadastrar-prod.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body class="background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="header">
                <div class="logo">Dispenser<span>APP</span></div>
            </div>

            <div class="col-12 form" id="cadastro">
                <div class="container">
                    <h2 class="title">Cadastrar um produto manual:</h2>
                </div>
                <form name="cad-prod" action="form_cadastro_prod.php" method="POST">
                    <div class="container">
                        <div class="item">
                            <label class="form__label">Nome:</label>
                            <input type="text" class="form__input" name="prod-name" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Tipo do produto:</label>
                            <input type="text" class="form__input" name="prod-tipo" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Código de Barras:</label>
                            <input type="text" class="form__input" name="prod-cod" required>
                        </div>
                        <div class="item">
                            <label class="form__label">Data de validade:</label>
                            <input type="text" class="form__input" id="datavalidade" name="data-validade" required>
                        </div>
                        <div class="item">
                            <button class="botao-cadastrar cadastrar-blue"><span class="add" style=" width: 28PX;
                                height: 28PX;
                                margin-bottom: -6px;
                                margin-right: 10px;"></span> Cadastrar Produto!</button>
                        </div>
                        <?php
                        $sucesso = $_GET["sucesso"];

                        if(!is_null($sucesso) && !empty($sucesso) && $sucesso == 1) {
                            ?>
                            <div class="item">
                                <label class="form__label">Produto cadastrado com sucesso! Acesse a lista de produtos para ve-lo!</label>
                            </div>
                        <?php } ?>
                    </div>
                </form>
                <div class="container">
                    <div class="item">
                        <h2 class="title">Obtenha os dados cadastrais do produto via celular:</h2>
                    </div>

                    <div class="item">
                        <button class="botao-cadastrar"> <span class="camera" style=" width: 28PX;
                            height: 28PX;
                            margin-bottom: -6px;
                            margin-right: 10px;"></span> Usar camera do celular para leitura do código de barras!</button>
                    </div>
                </div>
            </div>

            <div class="col-12" id="footer">
                Olá <span class="span--user">ADM</span>, hoje é dia <span class="span--bold">16/10/2017!</span> O produto mais próximo de vencimento é <span class="span--bold">31/12/2017!</span>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="scripts/platformOverrides.js"></script>
    <script type="text/javascript" src="scripts/index.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../bootstrap/bootstrap-datepicker.pt-BR.min.js"></script>
</body>

</html>