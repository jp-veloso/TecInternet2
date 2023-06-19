<?php
include_once "seguranca.php";
include_once "conexao.php";

$conexao = new conexao();

// Verificar se um ID de tarefa foi fornecido
if (isset($_GET['id'])) {
  $idTarefa = $_GET['id'];

  // Consultar a tarefa pelo ID
  $tarefa = $conexao->executar("SELECT * FROM tarefas WHERE id = $idTarefa");

  // Verificar se a tarefa foi encontrada
  if ($tarefa) {
    $titulo = $tarefa[0]['titulo'];
    $descricao = $tarefa[0]['descricao'];
    $dataConclusao = $tarefa[0]['data_conclusao'];
  } else {
    // Redirecionar para a página principal se a tarefa não for encontrada
    header("Location: index.php");
    exit();
  }
} else {
  // Redirecionar para a página principal se o ID da tarefa não for fornecido
  header("Location: index.php");
  exit();
}

// Verificar se o formulário foi enviado para atualizar a tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $novoTitulo = $_POST['titulo'];
  $novaDescricao = $_POST['descricao'];
  $novaDataConclusao = $_POST['data_conclusao'];

  // Atualizar a tarefa no banco de dados
  $conexao->executar("UPDATE tarefas SET titulo = '$novoTitulo', descricao = '$novaDescricao', data_conclusao = '$novaDataConclusao' WHERE id = $idTarefa");

  // Redirecionar para a página principal para atualizar a tabela de tarefas
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarefas Já - Editar Tarefa</title>
  
  <!-- Adicionar link para o arquivo CSS do Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Tarefas Já - Editar Tarefa</h1>

    <!-- Formulário para editar a tarefa -->
    <h2>Editar Tarefa</h2>
    <form action="editar_tarefa.php?id=<?php echo $idTarefa; ?>" method="POST">
      <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao"><?php echo $descricao; ?></textarea>
      </div>

      <div class="form-group">
        <label for="data_conclusao">Data de Conclusão:</label>
        <input type="date" class="form-control" id="data_conclusao" name="data_conclusao" value="<?php echo $dataConclusao; ?>" required>
      </div>

      <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
    </form>
  </div>

  <!-- Adicionar scripts do Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

