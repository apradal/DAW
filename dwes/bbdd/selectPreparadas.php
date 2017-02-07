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
$host="localhost";
$usuario="root";
$pass="tonito22";
$nombreBD="dwes";
$miConexion = new mysqli($host,$usuario,$pass,$nombreBD);

//una vez conectado hay que preparar los statements
$select = $miConexion->stmt_init();

//en este caso parametrizo los valores (se podrian indicar directamente en el insert
$select->prepare('SELECT producto, unidades FROM stock WHERE ?<?');

//declaro los parametros (TIENEN QUE SER SIEMPRE EN VARIABLES, NUNCA DIRECTAMENTE)
$dato1 = "unidades";
$dato2 = 2;
$select->bind_param('si', $dato1, $dato2);

if (isset($_POST['select'])){
    //ejecuto el estatement con los parametros ya metidos como bind.
    $select->execute();
    //se meten en variables los resultados
    $select->bind_result($producto, $unidades);
    while ($select->fetch()){
        echo "Producto $producto: $unidades unidades<br/>";
    }
    //cierro el statement y la base de datos.
    $select->close();
    $miConexion->close();
}
?>
    <input type="submit" value="Select" name="select"/>
</form>
</body>
</html>