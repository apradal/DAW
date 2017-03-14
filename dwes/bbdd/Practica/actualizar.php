<?php

function conectar($usuario,$password,$bd){

    try{

        $conexion = new PDO("mysql:host=localhost;dbname=$bd", "$usuario", "$password");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($conexion){
            return $conexion;
        }

    } catch (PDOException $p){
        echo "<span class='error'>Oops, no ha podido conectarse</span><br/><br/>";
        echo  " Motivo:" . $p->getMessage();
        return false;
    }
}

function update(PDO $conexion,$sentencia,$parametros){

    try{

        $update = $conexion->prepare($sentencia);
        $update->execute($parametros);
        return true;

    }catch(PDOException $p){
        echo "<span class='error'>Error " . $p->getMessage() . "</span><br/>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if (isset($_POST['actualizar'])){

    $oldname = $_POST['oldname'];
    $nombrec = $_POST['nombrec'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $pvp = $_POST['pvp'];

    //llamamos al metodo conectar y le pasamos los parametros.
    $conexion = conectar("root","tonito22","dwes");

    if ($conexion){

        $sentencia = "UPDATE producto SET nombre_corto = :nombre_corto, nombre = :nombre, descripcion = :descripcion, PVP = :pvp WHERE nombre_corto = :nc";
        $parametros = [":nombre_corto" => $nombrec, ":nombre" => $nombre, ":descripcion" => $descripcion, ":pvp" => $pvp, ":nc" => $oldname];

        if (update($conexion,$sentencia,$parametros)) echo '<p>Registro actualizado</p>';
        /* redireccion */
        header( "refresh:2;url=listado.php" );
        exit();

    }

}
if (isset($_POST['cancelar'])){

    echo "<span class='error'>Se canceló la operación</span><br/><br/>";
    header( "refresh:2;url=listado.php" );
    exit();

}
?>
</body>
</html>