<?php
include_once "conexao.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$con = new conexao();

$sql = "select * from usuarios where email= '$email' and senha ='$senha' ";
$res = $con->executar($sql);

if (sizeof($res) > 0) {
    $_SESSION['id'] = $res[0]["id"];
    $_SESSION['nome'] = $res[0]['nome'];
    header("location: listagem.php");
} else {
    echo "Usuário e senha inválido!";
}