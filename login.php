<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <h1>TarefasJá!</h1>
        <h3>Realize o login abaixo</h3>
        <form action="validacaoLogin.php" method="POST">
            <strong>E-mail:</strong>
            <input type="email" name="email" placeholder="Seu email" required/>
            <br><br><strong>Senha: </strong>
            <input type="password" name="senha"placeholder="Sua senha" required/>
            <br><br><input type="submit" value="Entrar"/>
            <a href="cadastroUsuario.php">Cadastrar</a>
        </form>
    </div>
</body>
</html>