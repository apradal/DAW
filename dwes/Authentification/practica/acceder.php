<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
session_start();
$usuariosBBDD = $_SESSION['usuario'];
$usuarioPass = $_SESSION['password'];
$counter = $_POST['counter'];

function comprobarPassword($usuarioPass, $pass){

        return ($usuarioPass == $pass) ? true : false;

}

function eliminarUsuario($usuario,$password){

    foreach ($_SESSION['usuario'] as $posicion => $value) {
        if ($value == $usuario){
            unset($_SESSION['usuario'][$posicion]);
            unset($_SESSION['password'][$posicion]);
        }
    }

}

?>
<h1>Inicio de sesión</h1>
<?php

if (isset($_POST['entrar'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    for ($i = 0;$i < count($usuariosBBDD); $i++){
        if ($usuariosBBDD[$i] == $usuario) {
            if (comprobarPassword($usuarioPass[$i],$password)){
                echo "<h2>Acceso correcto!!!</h2>";
                $counter = 0;
            } else {
                echo "<h2>Contraseña erronea</h2>";
                $counter++;
                echo "Fallos número: " . $counter . " (Solo tiene 3 intentos)";
                if ($counter == 3){
                    echo "<h2>Se ha superado el numero de intentos</h2>";
                    echo "<h2>Usuario: " .$usuario . " eliminado</h2>";
                    eliminarUsuario($usuario,$password);
                    header( "refresh:4;url=./index.php" );
                }
            }
        }
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="usuario">Usuario: <input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>"></label><span><?php echo $errorUsuario ?></span><br/>
    <label for="password">Contraseña: <input type="text" name="password" id="password" value="<?php echo $password ?>"></label><?php echo $errorPassword ?><br/><br/>
    <input type="hidden" name="counter" value="<?php echo $counter ?>"/>
    <input type="submit" value="Entrar" name="entrar"/><br/>
</form>
</body>
</html>