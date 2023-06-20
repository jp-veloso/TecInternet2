<?php
include_once "seguranca.php";
include_once "conexao.php";

$conexao = new conexao();

// Classificação padrão
$ordenarPor = 'data_criacao';
$ordem = 'DESC';

// Verificar se o formulário foi enviado para classificar as tarefas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ordenarPor = $_POST['ordenar_por'];
  $ordem = $_POST['ordem'];
}

// Verificar se o filtro foi selecionado
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todos';
$where = '';
if ($filtro === 'pendentes') {
  $where = "WHERE concluida = 0";
} elseif ($filtro === 'concluidas') {
  $where = "WHERE concluida = 1";
}

// Consultar as tarefas com base na classificação e filtro
$sql = "SELECT * FROM tarefas $where ORDER BY $ordenarPor $ordem";
$arrTarefas = $conexao->executar($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarefas Já - Relatórios</title>

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
  <h1>Tarefas Já - Relatórios</h1>
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
      <a href="index.php" class="btn btn-primary">Página Principal</a>
      <a href="trocasenha.php" class="btn btn-primary">Trocar Senha</a>
    </div>
  </div>

  <!-- Formulário de classificação -->
  <h2>Classificar Tarefas</h2>
  <form action="relatorios.php" method="POST">
    <label for="ordenar_por">Ordenar por:</label>
    <select name="ordenar_por" id="ordenar_por">
      <option value="data_criacao" <?php echo ($ordenarPor === 'data_criacao') ? 'selected' : ''; ?>>Data de Criação</option>
      <option value="data_conclusao" <?php echo ($ordenarPor === 'data_conclusao') ? 'selected' : ''; ?>>Data de Conclusão</option>
    </select>

    <label for="ordem">Ordem:</label>
    <select name="ordem" id="ordem">
      <option value="ASC" <?php echo ($ordem === 'ASC') ? 'selected' : ''; ?>>Crescente</option>
      <option value="DESC" <?php echo ($ordem === 'DESC') ? 'selected' : ''; ?>>Decrescente</option>
    </select>

    <input type="submit" value="Classificar" class="btn btn-primary">
  </form>

  <!-- Filtros -->
  <h2>Filtros</h2>
  <ul>
    <li><a href="relatorios.php?filtro=todos" <?php echo ($filtro === 'todos') ? 'style="font-weight:bold;"' : ''; ?>>Todas as Tarefas</a></li>
    <li><a href="relatorios.php?filtro=pendentes" <?php echo ($filtro === 'pendentes') ? 'style="font-weight:bold;"' : ''; ?>>Tarefas Pendentes</a></li>
    <li><a href="relatorios.php?filtro=concluidas" <?php echo ($filtro === 'concluidas') ? 'style="font-weight:bold;"' : ''; ?>>Tarefas Concluídas</a></li>
  </ul>

  <!-- Tabela de tarefas -->
  <h2>Tarefas</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Data de Criação</th>
        <th>Data de Conclusão</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($arrTarefas as $tarefa) {
          $status = ($tarefa['concluida'] == 1) ? 'Concluída' : 'Pendente';
          echo "<tr>";
          echo "<td>".$tarefa['titulo']."</td>";
          echo "<td>".$tarefa['descricao']."</td>";
          echo "<td>".$tarefa['data_criacao']."</td>";
          echo "<td>".$tarefa['data_conclusao']."</td>";
          echo "<td>".$status."</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>

  <!-- Adicione o link para o arquivo JS do Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
