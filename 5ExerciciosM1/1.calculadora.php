<?php

    $numero1 = 0;
    $numero2 = 0;
    $resultado = 0;
    $calcular = 'somar';

    if(isset($_POST['numero1'],$_POST['numero2'],$_POST['calcular'])){
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $calcular =$_POST['calcular'];

        switch($calcular){
            case 'somar':
                $resultado = $numero1 + $numero2;
                break;
            case 'subtrair':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicar':
                $resultado = $numero1 * $numero2;
                break;
            case 'dividr':
                $resultado = $numero1 / $numero2;
                break;
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 1 - Calculadora</title>
</head>
<body>
    
    <form method="post">
        Primeiro número:
        <br>
        <input type="number" name="numero1" value=<?= $numero1 ?>required><br>
        Segundo Número:
        <br>
        <input type="number" name="numero2" value=<?= $numero2 ?>required><br><br>
        <select name="calcular">
            <option value="somar">Somar</option>
            <option value="subtrair">Subtrair</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>
        <br><br>
        <input type="submit" value="calcular">
        <br><br>
        <p>O resultado é: <?= $resultado ?></p>

    </form>

</body>
</html>
