<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Actualizar</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    //conectar a base de datos
    $host="localhost";
    $usuario="root";
    $pass="tonito22";
    $nombreBD="dwes";
    $miConexion = new mysqli($host,$usuario,$pass,$nombreBD);
    $update = "UPDATE tienda SET nombre = 'Tienda principal' WHERE  nombre = 'Tienda centro'";
    if (isset($_POST['actualizar'])){
        $resultado = $miConexion->query($update);
        if ($resultado){
            echo "Se han actualizado " . $miConexion->affected_rows . " filas en esta acción<br />";
        } else {
            echo "Error: " . $miConexion->error;
        }
        $miConexion->close();
    }
    ?>
    <input type="submit" value="Actualizar" name="actualizar"/>
</form>
</body>
</html>