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
</head>

<body>
    
        <h2>Tela de Cadastro</h2>

        <?php
        $conexao = new conexao();
        if ($conexao->testarConexao()) {
            echo "Atualmente recebendo novos cadastros!";
        } else {
        echo "Infezlimente, não estamos recebendo novos cadastros.";
        }
?>
<br><br>
        <form action="acoes.php?acao=1" method="POST">
            <strong>Nome:</strong>
            <input type="text" name="nome" placeholder="Seu nome" required/>
            <br><br><strong>E-mail:</strong>
            <input type="email" name="email" placeholder="Seu email" required/>
            <br><br><strong>Senha:</strong>
            <input type="password" name="senha" placeholder="Sua senha" required/>
            <br><br><input type="submit" value="Enviar Dados">
            <a href="./index.php">Voltar para login</a>
        </form>
        <br><br><br>
</body>
</html>

