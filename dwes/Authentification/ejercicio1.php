<?php
if ($_SERVER['PHP_AUTH_USER']!='antonio' || $_SERVER['PHP_AUTH_PW']!='antonio') {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Haz un programa en el que controlemos que el usuario con tu nombre y
la misma password pueda acceder Solo se dejarán 3 intentos si al tercer intento
 no lo consigue se le anulará la posibilidad de seguir intentándolo*/
?>
<p>Hola que tal, bienvenido <?php echo $_SERVER['PHP_AUTH_USER']?></p><br/>
<p>Tu password es: <?php echo $_SERVER['PHP_AUTH_PW']?></p><br/>
<p>El tipo de autentificacion es: <?php echo $_SERVER['AUTH_TYPE']?></p><br/>
</body>
</html>