<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-top: 0;
    }

    form {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 340px;
      margin: 0 auto; /* Centraliza horizontalmente */
    }

    form strong {
      display: block;
      margin-bottom: 10px;
      font-family: Arial, sans-serif; /* Altera a fonte */
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
      font-size: 16px;
      font-family: Arial, sans-serif; /* Altera a fonte */
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
      color: #333;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div>
    <h1>Tela de Cadastro</h1>
    <form action="validacaoLogin.php" method="POST">
      <strong>E-mail:</strong>
      <br>
      <input type="email" name="email" placeholder="Seu email" required>
      <br><br>
      <strong>Senha:</strong>
      <br>
      <input type="password" name="senha" placeholder="Sua senha" required>
      <br><br>
      <input type="submit" value="Entrar">
      <a href="cadastroUsuario.php">Cadastrar</a>
    </form>
  </div>
</body>

</html>
