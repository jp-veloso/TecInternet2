<?php 
 if(isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['data_nascimento'])){
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$data_nascimento = $_POST['data_nascimento'];

			// Verifica se os campos não estão vazios
			if(!empty($nome) && !empty($cpf) && !empty($data_nascimento)){
				echo "<p>Nome: $nome</p>";
				echo "<p>CPF: $cpf</p>";
				echo "<p>Data de Nascimento: $data_nascimento</p>";
			}else{
				echo "<p>Todos os campos são obrigatórios!</p>";
			}
		}else{
			echo "<p>Ocorreu um erro ao processar o formulário!</p>";
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulário</title>
</head>
<body>
	<form method="POST" action="script.php">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome" required><br><br>

		<label for="cpf">CPF:</label>
		<input type="text" id="cpf" name="cpf" required><br><br>

		<label for="data_nascimento">Data de Nascimento:</label>
		<input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>
