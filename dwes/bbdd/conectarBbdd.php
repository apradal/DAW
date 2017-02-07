<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
//conectar a base de datos
$host="localhost";
$usuario="root";
$pass="tonito22";
$nombreBD="dwes";

//conectar
if (isset($_POST['conectar'])){
    $miConexion = new mysqli($host,$usuario,$pass,$nombreBD);
    if ($miConexion->connect_error){
        echo "Error: No se ha podido conectar: " . $miConexion->connect_error;
    } else {
        echo "Conectado a la base de datos";
        //cierro la conexion
        $miConexion->close();
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" value="Conectar" name="conectar"/>
</form>
</body>
</html>