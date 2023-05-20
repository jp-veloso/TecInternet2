<?php
include_once "seguranca.php";
include_once "conexao.php";

$conexao = new conexao();
$arrUsuarios = $conexao->executar("select * from usuarios");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Listagem de Usuários</h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arrUsuarios as $usuarios) { ?>
                    <tr>
                        <td><?= $usuarios['id'] ?></td>
                        <td><?= $usuarios['email'] ?></td>
                        <td><?= $usuarios['senha'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="logout.php" method="post">
            <input onclick="msgLogout()" type="submit" class="btn btn-primary" value="Deslogar">
        </form>
    </div>

    <script>
        function msgLogout() {
            alert("Deslogado com sucesso!");
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
