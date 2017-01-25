<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>Registro de usuario</h2>
<?php
/**
 * @param $usuario
 * @return bool
 * Comprueba la longitud de usuario
 */
function comprobarLongitud($usuario){

    return (strlen($usuario) < 6 || strlen($usuario) > 10) ? false : true;

}

/**
 * @param $usuario
 * @return int
 * Comprueba el pattern de usuario.
 */
function comprobarReg($usuario){
    $patternUsuario = '/[a-zA-Z]+$/';
    return preg_match($patternUsuario,$usuario);
}

/**
 * @param $password
 * @return bool
 * Comprueba la longitud de la password
 */
function comprobarLongitudPass($password){

    return (strlen($password) == 8) ? true : false;

}

/**
 * @param $password
 * @return int
 * Comprueba el pattern de la password.
 */
function comprobarRegPass($password){

    $patternPassword = "/[a-z]*[0-9][a-z]*[0-9][a-z]*/";
    return preg_match($patternPassword, $password);

}

function crearSession($usuario,$password){

    if (!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = array();
        array_push($_SESSION['usuario'],$usuario);
    } else{
        array_push($_SESSION['usuario'],$usuario);
    }
    if (!isset($_SESSION['password'])){
        $_SESSION['password'] = array();
        array_push($_SESSION['password'],$password);
    } else {
        array_push($_SESSION['password'],$password);
    }

}
session_start();
//session_destroy();
//PROGRAMA
if (isset($_POST['registrar'])){
    $errorUsuario = "";
    $errorPassword = "";
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $contador = $_POST['contador'];

    if (comprobarLongitud($usuario)){
        if (comprobarReg($usuario)){
            if (comprobarLongitudPass($password)){
                if (comprobarRegPass($password)){
                    crearSession($usuario,$password);
                    echo "<h2>Usuario creado</h2>";
                    header( "refresh:2;url=./index.php" );
                } else {
                    $errorPassword = "Error: La contraseña deben ser caracteres de la a hasta la z y números";
                    echo "Intentos fallidos: " . $contador . " (máximo 3 fallos)<br/>";
                }
            } else {
                $errorPassword = "Error: La longitud de la contraseña solo puede ser de 8 caracteres";
                echo "Intentos fallidos: " . $contador . " (máximo 3 fallos)<br/>";
            }
        } else {
            $errorUsuario = "Error: Solo se admiten letras.";
            echo "Intentos fallidos: " . $contador . " (máximo 3 fallos)<br/>";
        }
    } else {
        $errorUsuario = "Error: La longitud del usuario solo puede ser de 6 a 10 caracteres";
        echo "Intentos fallidos: " . $contador . " (máximo 3 fallos)<br/>";
    }
    if ($errorUsuario != "" || $errorPassword != "") $contador++;
    if ($contador == 3){
        echo "<h2>Se ha superado el numero de intentos</h2><br/>";
        header( "refresh:2;url=./index.php" );
    }

}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="usuario">Usuario: <input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>"></label><span><?php echo $errorUsuario ?></span><br/>
    <label for="password">Contraseña: <input type="text" name="password" id="password" value="<?php echo $password ?>"></label><?php echo $errorPassword ?><br/><br/>
    <input type="hidden" name="contador" value="<?php echo $contador ?>"/>
    <input type="submit" value="Registrarse" name="registrar"/><br/>
</form>
</body>
</html>