<?php
session_start();


// Verifica se a página foi acessada via POST para cadastrar um novo item
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['nome'])) {
        $nome = $_POST['nome'];
        // Adiciona o novo item ao array de itens do usuário
        $_SESSION['usuarios'][$_SESSION['usuario_autenticado']]['itens'][] = $nome;
        echo 'Item cadastrado com sucesso.';
    } else {
        echo 'Por favor, preencha o nome do item.';
    }
}

// Verifica se foi solicitada a exclusão de um item
if (isset($_GET['excluir'])) {
    $indice = $_GET['excluir'];
    // Remove o item com o índice especificado do array de itens do usuário
    unset($_SESSION['usuarios'][$_SESSION['usuario_autenticado']]['itens'][$indice]);
    echo 'Item excluído com sucesso.';
}

?>

<h1>Bem-vindo(a) colaborador JP, <?php echo $_SESSION['usuarios'][$_SESSION['usuario_autenticado']]['nome']; ?></h1>
<p>Inventario do supermercado JP</p>
<h2>Cadastrar item</h2>

<form method="post">
    <label>Nome:</label>
    <input type="text" name="nome"><br>
    <br>
    <input type="submit" value="Cadastrar">
</form>

<h2>Itens cadastrados</h2>

<?php if (isset($_SESSION['usuarios'][$_SESSION['usuario_autenticado']]['itens'])): ?>
    <ul>
        <?php foreach ($_SESSION['usuarios'][$_SESSION['usuario_autenticado']]['itens'] as $indice => $item): ?>
            <li>
                <?php echo $item; ?>
                <a href="?excluir=<?php echo $indice; ?>">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Nenhum item cadastrado.</p>
<?php endif; ?>

<a href="index.php">Sair</a>
