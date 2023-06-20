<?php
include_once "conexao.php";
$acao = $_GET["acao"];

// Inserir dados de usuários
if ($acao == 1) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se a senha atende aos critérios
    if (strlen($senha) >= 6 && preg_match('/[A-Z]/', $senha) && preg_match('/[0-9]/', $senha)) {
        $sql = "INSERT into usuarios (nome, email, senha) values ('$nome', '$email', '$senha')";
        $conexao = new conexao();
        $conexao->executar($sql);
        header("location: index.php?acao=1");
        die();
    } else {
        echo "<script>alert('A senha não atende aos critérios mínimos: deve ter pelo menos 6 caracteres, uma letra maiúscula e um número.'); window.location.href = 'cadastroUsuario.php';</script>";
    }
}
?>
