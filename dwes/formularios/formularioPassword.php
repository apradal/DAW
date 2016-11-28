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
$nameErr = $passErr = '';
$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_ENCODED);
if ($_POST['send']) {
    $nameErr = ($name) ? '' : '* Error debe introducir nombre';
    if (!$pass){
        $passErr = ($pass) ? '' : '* Error debe introducir password';
    } elseif ($pass !== '123'){
        $passErr = '* Error la contraseña no coincide';
    }
}
?>
<?php if (($name && $pass) and $pass == '123') : ?>
<span>
    <p>Usuario: <?php echo $name ?> acceso correcto</p>
</span>
<?php else: ?>
<h2>Intranet de la página</h2>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="name">Nombre: </label><input type="text" name="name" id="name" value="<?php echo $name ?>"/>
        <span class="error"><?php echo $nameErr ?></span><br>
    <label for="pass">Password: </label><input type="password" name="pass" id="pass" value="<?php echo $pass ?>"/>
        <span class="error"><?php echo $passErr ?></span><br>
    <input type="submit" value="Enviar" name="send">
</form>
<?php endif; ?>
</body>
</html>