<?php 
  $texto = '';

  if (isset($_GET['texto'])) {
    $texto = $_GET['texto'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parametro</title>
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
</style>

<body>
    <form>
      <input type="text" name="texto" placeholder="Digite algo aqui" required >
      <input type="submit">

      <p>Observe na URL, você digitou <?=$texto?> e apareceu o mesmo em cima</p>
    </form>
</body>
</html>