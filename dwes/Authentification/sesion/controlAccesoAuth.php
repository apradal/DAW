<?php if ($_SERVER['PHP_AUTH_USER']!='antonio' || $_SERVER['PHP_AUTH_PW']!='antonio') {
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
session_start();
$_SESSION['usuario'] = $_SERVER['PHP_AUTH_USER'];
$_SESSION['pass'] = md5($_SERVER['PHP_AUTH_PW']);
if (isset($_POST['borrar'])){
    unset($_SESSION['fechas']);
}
if (!isset($_SESSION['fechas'])){
    $_SESSION['fechas'] = [time()];
    echo "Bienvenido!!! Es su primera visita <br/>";
} else {
    echo "Nombre de usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "Contraseña: " . $_SESSION['pass'] . "<br/>";
    foreach ($_SESSION['fechas'] as $valor){
        echo "Se logueo " . $valor ."<br/>";
    }
    array_push($_SESSION['fechas'], time());
}

/*Crea una página similar a la anterior usada en cookies,
Almacena en la sesión de usuario los instantes de todas sus últimas visitas.
Si es su primera visita, muestra un mensaje de bienvenida.
En caso contrario, muestra la fecha y hora de todas sus visitas anteriores.
Añade un botón a la página que permita borrar el registro de visitas.
Utiliza también una variable de sesión para comprobar si el usuario se
ha autentificado correctamente. De esta forma no hará falta comprobar las
credenciales con la base de datos constantemente.*/
//session_destroy();
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <input type="submit" name="borrar" value="borrar"/>
</form>
</body>
</html>