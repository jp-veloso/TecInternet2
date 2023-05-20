<?php
include_once "conexao.php";
$acao = $_GET["acao"];

// Inserir dados de usuarios
if ($acao == 1) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT into usuarios (nome,email,senha) values ('$nome','$email','$senha')";
    $conexao = new conexao();
    $conexao->executar($sql);
    header("location: index.php?acao=1");
    die();
}
