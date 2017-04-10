<?php
    spl_autoload_register(function ($clase) {
        require_once "$clase.php";}
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conectar base de datos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
$error = "";
//se comprueba que los campos del primer formulario no estén vacios.
if (isset($_POST['connect'])){


    //comprobación de host
    if (bd::checkFields($_POST['host'])){
        $host = $_POST['host'];
    } else {
        $error .= "El campo host está vacío o contiene caracteres no válidos.<br/>";
    }

    //comprobación de usuario
    if (bd::checkFields($_POST['user'])){
        $user = $_POST['user'];
    } else {
        $error .= "El nombre de usuario está vacío o contiene caracteres no válidos.<br/>";
    }

    //comprobación de password
    if (bd::checkFields($_POST['pass'])){
        $pass = $_POST['pass'];
    } else {
        $error .= "La contraseña está vacía o contiene caracteres no válidos.<br/>";
    }

}
?>
<main>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend class="title">Datos conexión</legend>
        <label for="host">Host</label>
        <input type="text" id="host" name="host" value="<?php echo $host ?>"/>
        <label for="user">Usuario</label>
        <input type="text" id="user" name="user" value="<?php echo $user ?>"/>
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass"/>
        <input class="btn" type="submit" value="Conectar" name="connect"/><br/>
        <span class="bbddError"><?php echo $error ?></span>
    </fieldset>
</form>
<?php
    //si los 3 campos están correctos.
    if ($host && $user && $pass){
        //creo conexión
        $conexion = bd::conectar($host,$user,$pass);

        if ($conexion) {
            //si conecta, meto el usuario, la pass y el servidor a variables sesion (ya que luego se utilizarán para ver las tablas)
            session_start();

            $_SESSION['host'] = $host;
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;

            //devuelve array con lista de las bases de datos existentes
            $databases = bd::listBbdd($conexion);
        } else {
            echo "<span class='bbddError'>Error al conectarse a la base de datos, compruebe los campos.</span>";
        }
    }

    if ($databases || $databases = json_decode($_POST['databases'])):
?>
        <form id="databases" action="tablas.php" method="post">
            <fieldset>
                <legend class="title">Gestion de la base de datos del host: <?php echo $host ?></legend>
                <?php
                    foreach ($databases as $valor) {
                        echo '<input type="radio" name="database" value="' . $valor . '"/><span>' . $valor . '</span><br/>';
                    }
                ?>
<!--                envio por campo oculto el array con todas las bases de datos, para luego si pincho en volver, recuperarlo.-->
                <input type="hidden" value="<?php echo htmlentities(json_encode($databases)) ?>" name="databases"/>
                <br/><input class="btn" type="submit" value="Gestionar" name="gestionar"/>
            </fieldset>
        </form>
<?php
endif;
?>
</main>
</body>
</html>