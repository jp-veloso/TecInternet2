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

<!-- Botão de logout -->
<form action="logout.php" method="post">
  <input type="submit" value="Logout">
</form>


<!-- Formulário para adicionar uma nova tarefa -->
<h2>Adicionar Nova Tarefa</h2>
<form action="index.php" method="POST">
  <label for="titulo">Título:</label>
  <input type="text" id="titulo" name="titulo" required><br><br>

  <label for="descricao">Descrição:</label><br>
  <textarea id="descricao" name="descricao"></textarea><br><br>

  <label for="data_conclusao">Data de Conclusão:</label>
  <input type="date" id="data_conclusao" name="data_conclusao" required><br><br>

  <input type="submit" value="Adicionar Tarefa">
</form>

<!-- Tabela de tarefas existentes -->
<h2>Tarefas</h2>
<table>
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
        echo "<a href='editar_tarefa.php?id=".$tarefa['id']."'>Editar</a>";
        echo "<a href='index.php?excluir=".$tarefa['id']."' style='margin-left: 10px;'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>

</body>
</html>
