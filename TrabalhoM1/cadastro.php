<?php
session_start(); // Inicia a sessão

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica se a página foi acessada via POST
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (isset($_SESSION['usuarios']) && array_key_exists($email, $_SESSION['usuarios'])) {
            echo 'Já existe um usuário cadastrado com este e-mail.';
        } else {
            $_SESSION['usuarios'][$email] = [
                'nome' => $nome,
                'email' => $email,
                'senha' => password_hash($senha, PASSWORD_DEFAULT) // Usa a função password_hash() para armazenar a senha criptografada
            ];
            echo 'Usuário cadastrado com sucesso.';
            header('Location: index.php');
            exit;

        }
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}
?>

<h1>Página de cadastro.</h1>
<p>Por favor, preencha todas as informações abaixo.</p>

<form method="post">
    <label>Nome:</label>
    <input type="text" name="nome"><br><br>

    <label>E-mail:</label>
    <input type="email" name="email"><br><br>

    <label>Senha:</label>
    <input type="password" name="senha"><br><br>

    <input type="submit" value="Cadastrar">
</form>
