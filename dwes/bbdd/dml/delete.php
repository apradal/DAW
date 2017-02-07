<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Borrar</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    //conectar a base de datos
    $host="localhost";
    $usuario="root";
    $pass="tonito22";
    $nombreBD="dwes";
    $miConexion = new mysqli($host,$usuario,$pass,$nombreBD);
    $delete = "DELETE FROM tienda WHERE nombre = 'Tienda centro'";
    if (isset($_POST['borrar'])){
        $resultado = $miConexion->query($delete);
        if ($resultado){
            echo "Se ha borrado " . $miConexion->affected_rows . " filas en esta acción<br />";
        } else {
            echo "Error: " . $miConexion->error;
        }
        $miConexion->close();
    }
    ?>
    <input type="submit" value="Borrar" name="borrar"/>
</form>
</body>
</html>