<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Insertar</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php
//conectar a base de datos
$host="localhost";
$usuario="root";
$pass="tonito22";
$nombreBD="dwes";
$miConexion = new mysqli($host,$usuario,$pass,$nombreBD);
//indicamos que esta conexion no va a tener commit automatico
$miConexion->autocommit(false);
$insert = "INSERT INTO tienda (nombre, tlf) VALUES ('Tienda centro', '111-155226')";
if (isset($_POST['insertar'])){
    $resultado = $miConexion->query($insert);
    if ($resultado){
        echo "Se han insertado " . $miConexion->affected_rows . " filas en esta acción<br />";
        //el insert_id seía la clave primaria
        echo "en la inserción se asignó el id autogenerado $miConexion->insert_id <br />";
        //aqui ahora debo indicar el commit
        $miConexion->commit();
    } else {
        echo "Error: " . $miConexion->error;
        //como ha fallado debo hacer el rollback
        $miConexion->rollback();
    }
    $miConexion->close();
}
?>
    <input type="submit" value="Insertar" name="insertar"/>
</form>
</body>
</html>