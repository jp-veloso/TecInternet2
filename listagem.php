<?php
include_once "seguranca.php";
include_once "conexao.php";

$conexao = new conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuários</title>

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
<h1>Listagem de Usuários</h1>
    <table>
        <tbody>
        <tr>
                    <th>ID</th>
                    <th>email</th>
                    <th>senha</th>
                </tr>
        <?php
            $arrUsuarios = $conexao->executar("select * from usuarios");
            foreach ($arrUsuarios as $usuarios) {
            ?>
                <tr>
                    <th><?= $usuarios['id'] ?></th>
                    <th><?= $usuarios['email'] ?></th>
                    <th><?= $usuarios['senha'] ?></th>

                    <?php
                }
                ?>
        </tbody>
    </table>

    <form action="logout.php" method="post">
    <input onclick="msgLogout()" type="submit" value="Deslogar">
</form>

<script>
function msgLogout() {
  alert("Deslogado com sucesso!");
}
</script>
</body>
</html>