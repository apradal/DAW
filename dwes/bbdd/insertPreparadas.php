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

//una vez conectado hay que preparar los statements
$insert = $miConexion->stmt_init();

//en este caso parametrizo los valores (se podrian indicar directamente en el insert
$insert->prepare('INSERT INTO tienda (nombre, tlf) VALUES (?, ?)');

//declaro los parametros (TIENEN QUE SER SIEMPRE EN VARIABLES, NUNCA DIRECTAMENTE)
$dato1 = "caracol";
$dato2 = "666555";
$insert->bind_param('ss', $dato1, $dato2);

if (isset($_POST['insertar'])){
    //ejecuto el estatement con los parametros ya metidos como bind.
    $resultado = $insert->execute();
    if ($resultado){
        echo "Se han insertado " . $miConexion->affected_rows . " filas en esta acción<br />";
        //el insert_id seía la clave primaria
        echo "en la inserción se asignó el id autogenerado $miConexion->insert_id <br />";
    } else {
        echo "Error: " . $miConexion->error;
    }
    //cierro el statement y la base de datos.
    $insert->close();
    $miConexion->close();
}
?>
    <input type="submit" value="Insertar" name="insertar"/>
</form>
</body>
</html>