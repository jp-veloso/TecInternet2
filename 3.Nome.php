<?php 
  $nome = '';
  $email = '';
  $senha = '';

  if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email</title>
</head>

<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  input {
    display: block;
    margin-bottom: 24px;
  }
  .invalid {
    color: red;
  }
</style>

<body>
  <form method="POST">
    <label for="nome">Digite o seu nome</label>
    <input type="text" name="nome" placeholder="Lucas Mesquita">
    <label for="email">Digite o seu email</label>
    <input type="email" name="email" placeholder="uniube@uniube.com">
    <label for="senha">Digite a sua senha</label>
    <input type="password" name="senha">

    <input type="submit" name="Enviar">

    <?php 
      if ($nome == null) {
      echo '<p class="invalid">Nome inválido</p>';
    }
      if ($email == null) {
        echo '<p class="invalid">Email inválido</p>';
      }
      if ($senha == null) {
        echo '<p class="invalid">Senha inválida</p>';
      }
    ?>

    <p><?=$nome?></p>
    <p><?=$email?></p>
    <p><?=$senha?></p>
  </form>
</body>
</html>