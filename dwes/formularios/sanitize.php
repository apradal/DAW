<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .error{color: red}
    </style>
</head>
<body>
<?php
//variables values form
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
//variables de error form
$nameErr = '';
//condicionales para añadir error a la variable
if ($_POST){
    $nameErr = (!$name) ? '* Error debe introducir nombre' : '';
}

?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="name">Nombre: </label><input type="text" name="name" id="name" value="<?php echo $name ?>"/>
    <span class="error"><?php echo $nameErr ?></span><br>
    <label for="age">Edad: </label><input type="text" name="age" id="age" value="<?php echo $age ?>"/>
    <input type="submit" value="Enviar"/>
</form><br>
<span>
    <?php
    echo 'Su nombre es: ' . $name . '<br>';
    echo 'Su edad es: ' . $age . '<br>';
    ?>
</span>
</body>
</html>