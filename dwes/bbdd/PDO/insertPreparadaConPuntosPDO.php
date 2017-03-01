<?php
function conectar(){

    $miConexion = new PDO("mysql:host=localhost;dbname=dwes", "root", "tonito22");

    if ($miConexion){
        return $miConexion;
    } else {
        return false;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="insertar" value="insertar"/>
</form>
<?php
//voy a insertar en la tabla familia (cod y nombre). con la forma :cod :nombre
if (isset($_POST['insertar'])){
    $miConexion = conectar();
    $insert = $miConexion->prepare('INSERT INTO familia (cod, nombre) VALUES (:cod, :nombre)');
    $codigo = "MP4";
    $nombre = "Reproductor MP4";
    $insert->bindParam(":cod", $codigo);
    $insert->bindParam(":nombre", $nombre);
    $resultado = $insert->execute();
    if ($resultado){
        echo 'insertado correctamente';
    } else{
        echo 'Error';
    }
    $insert->closeCursor();
}
?>
</body>
</html>