<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Select preparadas</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php
//conectar a base de datos
$miConexion = new PDO("mysql:host=localhost;dbname=dwes", "root", "tonito22");

if ($miConexion){
    echo "Estamos conectados";
} else {
    echo "Fallo de conexion";
}

//debo meter en la consulta (select) la conexion->prepare
//DOS FORMAS CON ? o :blabla
//$select = $miConexion->prepare('SELECT producto, unidades FROM stock WHERE unidades < ?');
$select = $miConexion->prepare('SELECT producto, unidades FROM stock WHERE unidades < :dato1 AND tienda = :dato2');

$dato1 = 2;
$dato2 = 1;

if (isset($_POST['select'])){

    //para la primera forma (con ?)
    //$select->execute(array($dato1));
    //para la segunda forma (con :blabla) LA MEJOR
    $select->execute(array(':dato1' => $dato1, ':dato2' => $dato2));

    while ($resultado = $select->fetch()){
        echo "Producto $resultado[0]: $resultado[1] unidades<br/>";
    }
    //cierro el statement y la base de datos.
    $select->closeCursor();
}

?>
    <br/><input type="submit" value="Select" name="select"/>
</form>
</body>
</html>