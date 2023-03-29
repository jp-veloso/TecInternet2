<?php 
  if(isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['sexo'])){
			$nome = $_POST['nome'];
			$idade = $_POST['idade'];
			$sexo = $_POST['sexo'];

			// Verifica se os campos não estão vazios
			if(!empty($nome) && !empty($idade) && !empty($sexo)){
				echo "<p>Nome: $nome</p>";
				echo "<p>Idade: $idade</p>";
				echo "<p>Sexo: $sexo</p>";
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
	<form method="POST">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome" required><br><br>

		<label for="idade">Idade:</label>
		<input type="number" id="idade" name="idade" required><br><br>

		<label for="sexo">Sexo:</label>
		<select id="sexo" name="sexo" required>
			<option value="">Selecione...</option>
			<option value="masculino">Masculino</option>
			<option value="feminino">Feminino</option>
			<option value="outro">Outro</option>
		</select><br><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>
