<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Haz un programa que tu piensas un número de 0 al 1024 y el programa te lo adivina
El programa te preguntará si es mayor menor o acertado
Deberá de adivinarlo en un máximo de 10 intentos
*/
?>
<h2>Adivina el número en un máximo de diez intentos</h2>
<p>Piensa un número del 0 al 1024</p>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="send" value="Empezar" onclick="activarDesactivar()"/><br/><br/>
    <?php
    $intentos = 1;
    if ($_POST['send']){
        $max = 1024;
        $min = 0;
        $num = $min + round(($max-$min)/2);
        $intentos = $_POST['intentos'];
        echo 'Es el número <b>' . $num . '</b>?';
        echo ' Número de intentos: ' . $intentos++;
    } elseif ($_POST['mayor']){
        $intentos = $_POST['intentos'];
        $min = $_POST['num'] + 1;
        $max = $_POST['max'];
        $num = $min + round(($max-$min)/2);
        echo 'Es el número <b>' . $num . '</b>?';
        echo ' Número de intentos: ' . $intentos++;
    } elseif ($_POST['menor']){
        $intentos = $_POST['intentos'];
        $min = $_POST['min'];
        $max = $_POST['num'] - 1;
        $num = $min + round(($max-$min)/2);
        echo 'Es el número <b>' . $num . '</b>?';
        echo ' Número de intentos: ' . $intentos++;
    } elseif ($_POST['igual']) {
        $intentos = $_POST['intentos'];
        echo '<b>Felicidades!!!</b>';
    }
    ?>
    <input type="hidden" value="<?php echo $intentos ?>" name="intentos"/>
    <input type="hidden" value="<?php echo $min ?>" name="min"/>
    <input type="hidden" value="<?php echo $max ?>" name="max"/>
    <input type="hidden" value="<?php echo $num ?>" name="num"/>
    <br/><br/><input type="submit" value="Mayor" name="mayor" id="mayor" <?php echo ($_POST ) ? '' : 'disabled' ?>/>
    <input type="submit" value="Menor" name="menor" id="menor" <?php echo ($_POST) ? '' : 'disabled' ?>/>
    <input type="submit" value="Acertado" name="igual" id="igual" <?php echo ($_POST) ? '' : 'disabled' ?>/>
</form>
</body>
</html>