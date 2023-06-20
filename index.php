<?php
include_once "seguranca.php";
include_once "conexao.php";

$conexao = new conexao();


// Verificar se o formulário foi enviado para adicionar uma nova tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $dataConclusao = $_POST['data_conclusao'];
  $usuarioId = $_SESSION['id'];

  // Inserir a nova tarefa no banco de dados
  $conexao->executar("INSERT INTO tarefas (usuario_id, titulo, descricao, data_conclusao) VALUES ('$usuarioId', '$titulo', '$descricao', '$dataConclusao')");
  // Redirecionar para a página principal para atualizar a tabela de tarefas
  header("Location: index.php");
  exit();
}

// Verificar se um ID de tarefa foi fornecido para exclusão
if (isset($_GET['excluir'])) {
  $idTarefa = $_GET['excluir'];

  // Excluir a tarefa do banco de dados
  $conexao->executar("DELETE FROM tarefas WHERE id = $idTarefa");

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
    <title>Tarefas Já - Página Principal</title>

    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<h1>Tarefas Já - Gerenciamento de Tarefas</h1>
<!-- Exibição do nome do usuário -->
<p>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</p>

<!-- Botões -->
<div class="row">
  <div class="col-md-6">
    <form action="logout.php" method="post">
      <input type="submit" value="Logout" class="btn btn-primary">
    </form>
  </div>
  <div class="col-md-6">
    <a href="trocasenha.php" class="btn btn-primary">Trocar Senha</a>
    <a href="relatorios.php" class="btn btn-primary">Relatórios</a> <!-- Botão de Relatórios -->
  </div>
</div>



<!-- Formulário para adicionar uma nova tarefa -->
<h2>Adicionar Nova Tarefa</h2>
<form action="index.php" method="POST">
  <label for="titulo">Título:</label>
  <input type="text" id="titulo" name="titulo" required class="form-control"><br><br>

  <label for="descricao">Descrição:</label><br>
  <textarea id="descricao" name="descricao" class="form-control"></textarea><br><br>

  <label for="data_conclusao">Data de Conclusão:</label>
  <input type="date" id="data_conclusao" name="data_conclusao" required class="form-control"><br><br>

  <input type="submit" value="Adicionar Tarefa" class="btn btn-primary">
</form>

<!-- Tabela de tarefas existentes -->
<h2>Tarefas</h2>
<table class="table">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descrição</th>
      <th>Data de Criação</th>
      <th>Data de Conclusão</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // Consultar as tarefas existentes
      $arrTarefas = $conexao->executar("SELECT * FROM tarefas");

      foreach ($arrTarefas as $tarefa) {
        echo "<tr>";
        echo "<td>".$tarefa['titulo']."</td>";
        echo "<td>".$tarefa['descricao']."</td>";
        echo "<td>".$tarefa['data_criacao']."</td>";
        echo "<td>".$tarefa['data_conclusao']."</td>";
        echo "<td>";
        echo "<a href='editar_tarefa.php?id=".$tarefa['id']."' class='btn btn-primary'>Editar</a>";
        echo "<a href='index.php?excluir=".$tarefa['id']."' class='btn btn-danger' style='margin-left: 10px;'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>

<!-- Adicione o link para o arquivo JS do Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
