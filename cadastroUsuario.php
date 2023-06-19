<?php
include_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <!-- Adicionar link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Tela de Cadastro</h2>

        <?php
        $conexao = new conexao();
        if ($conexao->testarConexao()) {
            echo "Atualmente recebendo novos cadastros!";
        } else {
            echo "Infelizmente, não estamos recebendo novos cadastros.";
        }
        ?>
        <br><br>
        <form action="acoes.php?acao=1" method="POST">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" class="form-control" name="nome" placeholder="Seu nome" required>
            </div>
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="email" class="form-control" name="email" placeholder="Seu email" required>
            </div>
            <div class="form-group">
                <strong>Senha:</strong>
                <input type="password" class="form-control" name="senha" placeholder="Sua senha" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Enviar Dados">
            <a href="./index.php" class="btn btn-link">Voltar para login</a>
        </form>
    </div>

    <!-- Adicionar scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
