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
$miConexion = new PDO("mysql:host=localhost;dbname=dwes", "root", "tonito22");

if ($miConexion){
    echo "Estamos conectados";
} else {
    echo "Fallo de conexion";
}

//con pdo hay que hacer las operaciones como si fueran statements.
$insert = $miConexion->prepare('INSERT INTO familia (cod, nombre) VALUES (?, ?)');
//Otra forma
//$insert = $miConexion->prepare('INSERT INTO familia (cod, nombre) VALUES (:cod, :nombre)');

//declaro los parametros (TIENEN QUE SER SIEMPRE EN VARIABLES, NUNCA DIRECTAMENTE)
$dato1 = "polo";
$dato2 = "palo";
//aqui varia un poco al metodo mysql, pero es la misma idea.
$insert->bindParam(1, $dato1);
$insert->bindParam(2, $dato2);
//De la otra forma (OJO, solo funciona si se ha ultilizado la otra forma en el preprare();
//$insert->bindParam(":cod", $dato1);
//$insert->bindParam(":nombre", $dato2);
//UNA 3º FORMA DE SUPLIR EL BIND_PARAM (2 formas)
//$parametros = array[":nombre","TABLET"];
//$parametros = array(":cod" => "TABLET", ":nombre" => "Tablet PC");

if (isset($_POST['insertar'])){

    //ejecutamos el statement.
    //NOTA: Si el insert no fuera parametrizada (sin ? o :nombre) habría que utilizar $resultado = $conexion->exec($sentencia);
    $resultado = $insert->execute();
    //Si se ha preprado los parametros como array (de la 3º forma) debemos pasar los parametros por el exceute
    //$insert->execute($parametros);

    if ($resultado){
        echo "Se han insertado con exito";
    } else {
        echo "Error";
    }

    //cierro el statement y la base de datos.
    $insert->closeCursor();
}
?>
    <br/><input type="submit" value="Insertar" name="insertar"/>
</form>
</body>
</html>