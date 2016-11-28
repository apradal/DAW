<?php
header( "refresh:2;url=index.html" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Usando la selección del tipo switch haz un programa que nos pregunte la edad y nos diga
si somos niños (0-11) adolescentes (12-17) jovenes (18-35) adultos (36-65) jubilados (66- ...)
La edad que no esté en el intevalo 0-110 años se visualizará 'edad no contenplada en nuestra encuesta'
Volver al index después de 2 segundos*/
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<?php if (!$_POST) :?>
    ¿Qué edad tiene? <input type="number" name="edad"><br>
    <input type="submit" value="Enviar" name="send">
<?php else :
    $edad = $_POST['edad'];
    switch ($edad){
        case ($edad >= 0 && $edad <= 11):
            echo '<p>Niños</p>';
            break;
        case ($edad >= 12 && $edad <= 17):
            echo '<p>adolescente</p>';
            break;
        case ($edad >= 18 && $edad <= 35):
            echo '<p>jovenes</p>';
            break;
        case ($edad >= 36 && $edad <= 65):
            echo '<p>adultos</p>';
            break;
        case ($edad >= 66 && $edad <= 110):
            echo '<p>jubilados</p>';
            break;
        default:
            echo '<p>edad no contemplada en nuestra encuesta</p>';
            break;
    }
    ?>
<?php endif;?>
</form>
</body>
</html>
