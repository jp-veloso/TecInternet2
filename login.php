<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Adicionar link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>TarefasJá!</h1>
        <h3>Realize o login abaixo</h3>
        <form action="validacaoLogin.php" method="POST">
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="email" class="form-control" name="email" placeholder="Seu email" required>
            </div>
            <div class="form-group">
                <strong>Senha:</strong>
                <input type="password" class="form-control" name="senha" placeholder="Sua senha" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Entrar">
            <a href="cadastroUsuario.php" class="btn btn-link">Cadastrar</a>
        </form>
    </div>

    <!-- Adicionar scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
