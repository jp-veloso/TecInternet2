<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (isset($_SESSION['usuarios']) && array_key_exists($email, $_SESSION['usuarios'])) {
            $usuario = $_SESSION['usuarios'][$email];

            if (password_verify($senha, $usuario['senha'])) {
                echo 'Login efetuado com sucesso.';
                header('Location: dashboard.php');
                exit;
            } else {
                echo 'Senha incorreta.';
            }
        } else {
            echo 'E-mail não cadastrado.';
        }
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}
?>

<h1>Seja bem-vindo ao Supermecado JP</h1>
<h2>Realize o login abaixo.</h2>
<form method="post">
    <label>E-mail:</label>
    <input type="email" name="email"><br>

    <label>Senha:</label>
    <input type="password" name="senha"><br>

    <input type="submit" value="Entrar">
</form>

<a href="cadastro.php">Cadastrar</a>
