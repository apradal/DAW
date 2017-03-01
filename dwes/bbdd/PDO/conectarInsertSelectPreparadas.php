<?php
function conectar(){

    $usuario = 'root';
    $password = 'tonito22';
    $conexion = new PDO("mysql:host=localhost;dbname=dwes", "$usuario", "$password");
    if ($conexion){
        return $conexion;
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
<?php
if (!isset($_POST['conectar']) && !isset($_POST['insert']) && !isset($_POST['select']) && !isset($_POST['insertar'])):
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    Usuario: <input type="text" name="usuario"/><br/>
    Contraseña: <input type="password" name="password"><br/>
    <input type="submit" name="conectar" value="Conectar"/>
</form>
<?php
endif;
if (isset($_POST['conectar'])):
?>
<p>¿Qué desea hacer?</p>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="select" value="Select"/>
    <input type="submit" name="insert" value="Insert"/><br/>
</form>
<?php
endif;
if (isset($_POST['insert'])):
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    Codigo: <input type="text" name="codigo"/>
    Nombre: <input type="text" name="nombre"/>
    PVP: <input type="text" name="precio"/>
    Familia: <input type="text" name="familia"/><br/><br/>
    Descripción: <textarea rows="1" cols="50" name="descripcion"></textarea><br/><br/>
    <input type="hidden" name="conexion" value="<?php echo htmlentities(json_encode($miConexion)) ?>">
    <input type="submit" name="insertar" value="Insertar"/><br/>
</form>
<?php
endif;
if (isset($_POST['insertar'])){
    $miConexion = conectar();
    $cod = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $pvp = $_POST['precio'];
    $familia = $_POST['familia'];
//    $insert = $miConexion->prepare('INSERT INTO producto (cod, nombre_corto, descripcion, pvp, familia) VALUES (:cod, :nombre_corto, :decripcion, :pvp, :familia)');
    $insert = $miConexion->prepare('INSERT INTO producto (cod, nombre_corto, descripcion, pvp, familia) VALUES (?, ?, ?, ?, ?)');
    $insert->bindParam(1, $cod);
    $insert->bindParam(2, $nombre);
    $insert->bindParam(3, $descripcion);
    $insert->bindParam(4, $pvp);
    $insert->bindParam(5, $familia);
//    $parametros = array(":cod" => $cod, ":nombre_corto" => $nombre, ":descripcion" => $descripcion, ":pvp" => $pvp, ":familia" => $familia);
    try{
        $insert->execute();
        echo 'Insertado correctamente';
    } catch (PDOException $p){
        echo "Error " . $p->getMessage() . "<br/>";
    }
    $insert->closeCursor();

}
if (isset($_POST['select'])){
    $miConexion = conectar();
    $select = $miConexion->query('SELECT * FROM producto');
    while ($resultado = $select->fetch()){
        echo 'Codigo: ' . $resultado['cod'] . ' Nombre: ' . $resultado['nombre_corto'] . ' PVP: ' . $resultado['PVP'] . '<br/>';
    }
}
?>
</body>
</html>