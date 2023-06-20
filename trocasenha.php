<?php
include_once "seguranca.php";
include_once "conexao.php";

$conexao = new conexao();

// Verificar se o formulário foi enviado para alterar a senha
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $senhaAtual = $_POST['senha_atual'];
  $novaSenha = $_POST['nova_senha'];
  $confirmarSenha = $_POST['confirmar_senha'];
  $usuarioId = $_SESSION['id'];

  // Verificar se a senha atual informada está correta
  $usuario = $conexao->executar("SELECT * FROM usuarios WHERE id = $usuarioId")[0];
  if ($senhaAtual === $usuario['senha']) {
    // Verificar se a nova senha e a confirmação são iguais
    if ($novaSenha === $confirmarSenha) {
      // Verificar se a nova senha atende aos critérios
      if (strlen($novaSenha) >= 6 && preg_match('/[A-Z]/', $novaSenha) && preg_match('/[0-9]/', $novaSenha)) {
        // Atualizar a senha no banco de dados
        $conexao->executar("UPDATE usuarios SET senha = '$novaSenha' WHERE id = $usuarioId");

        // Redirecionar para a página de login
        header("Location: login.php");
        exit();
      } else {
        $mensagemErro = "A nova senha não atende aos critérios mínimos: deve ter pelo menos 6 caracteres, uma letra maiúscula e um número.";
      }
    } else {
      $mensagemErro = "A nova senha e a confirmação não coincidem.";
    }
  } else {
    $mensagemErro = "A senha atual está incorreta.";
  }
}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas Já - Trocar Senha</title>

    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Tarefas Já - Trocar Senha</h1>

        <!-- Formulário para alterar a senha -->
        <form action="trocasenha.php" method="POST">
            <div class="form-group">
                <label for="senha_atual">Senha Atual:</label>
                <input type="password" id="senha_atual" name="senha_atual" required class="form-control">
            </div>
            <div class="form-group">
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required class="form-control">
            </div>
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Nova Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Alterar Senha" class="btn btn-primary">
            </div>
            <?php if (isset($mensagemErro)) { ?>
                <div class="alert alert-danger"><?php echo $mensagemErro; ?></div>
            <?php } ?>
        </form>
    </div>

    <!-- Adicione o link para o arquivo JS do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
