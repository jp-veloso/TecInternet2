<?php

$visualizar = '';
$fotoanimal = '';

if(isset($_GET['visualizar'])){
    $visualizar = $_GET['visualizar'];
}

switch($visualizar){
    case 'cachorros':
        $fotoanimal = "https://img.freepik.com/fotos-gratis/lindo-retrato-de-cachorro_23-2149218452.jpg";
        break;

    case 'gatos':
        $fotoanimal = 'https://ogimg.infoglobo.com.br/in/24649523-8a0-224/FT1086A/88249115.jpg';
        break;

    case 'tartarugas':
        $fotoanimal = 'https://media.istockphoto.com/id/93385233/pt/foto/tartaruga-da-birm%C3%A2nia.jpg?b=1&s=612x612&w=0&k=20&c=rsIKnxmPuKvaOuIgCc8YmqNmpT8PIFlPMGkJcah-BZY=';
        break;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos de animais</title>
</head>
<body>
Selecione uma das páginas que deseja:
<form method="GET">
    <select name="visualizar">
        <option value="cachorros">Cachorros</option>
        <option value="gatos">Gatos</option>
        <option value="tartarugas">Tartarugas</option>
    </select>
    <br><br>
    <input type="submit" value="visualizar"><br><br>

    Olha que fofura:<br>
    <img src="<?=$fotoanimal?>">
</form>
</body>
</html>
