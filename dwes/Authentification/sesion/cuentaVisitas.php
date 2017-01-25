<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Haz un programa que te cuente cuantas visitas recibe la página*/
session_start();
if (!isset($_SESSION['visitas'])){
    $_SESSION['visitas'] = 1;
} else {
    $_SESSION['visitas']++;
}
?>
<h1>Pagina que cuenta los acceso con variables de sesión.</h1>
<p>Has accedido <?php echo $_SESSION['visitas']?> veces</p>
</body>
</html>