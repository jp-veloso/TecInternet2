<?php
include_once "conexao.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$con = new conexao();

$sql = "select * from usuarios where email = '$email' and senha = '$senha'";
$res = $con->executar($sql);

if (sizeof($res) > 0) {
    $_SESSION['id'] = $res[0]["id"];
    $_SESSION['nome'] = $res[0]['nome'];
    header("location: listagem.php");
} else {
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Login</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f2f2f2;
            }
    
            .container {
                max-width: 400px;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    
    <body>
        <div class='container'>
            <h1 class='text-center'>Usuário e senha inválidos!</h1>
            <a href='index.php' class='btn btn-primary d-block mx-auto mt-4'>Voltar</a>
        </div>
    
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
    </body>
    
    </html>";
}
