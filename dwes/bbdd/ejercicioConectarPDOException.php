<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php
/*Realicemos un fichero de conexión a base de datos que contenga las siguientes funciones
conectar($bd, $usuario,$password) Retornará un objeto de la clase PDO si todo ok
consulta($sentencia,$parametros) Retorna un objeto de la clase PDOStatement si todo ok,
Recibe dos argumentos, un string que será la consulta parametrizada,
 y un array con los valores para cada parámetro
Insertar($tabla,$valores)
Recibe un string que es el nombre de tabla y un vector que serán los diferentes valores
 para cada campo de la tabla
Suponemos que se pasan los valores ok, si no, capturamos la excepción
*/

//funcion que conecta a la base de datos y devuelve el objeto PDO
function conectar($bd, $usuario, $password){


    try{

        $conexion = new PDO("mysql:host=localhost;dbname=$bd", "$usuario", "$password");
        //indico que mensajes debe capturar el catch de este PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e){
        echo "Error:  $e->getMessage() <br/>";
    }

}
//funcion para seleccionar datos (parametros es un array)
function consulta($sentencia,$parametros){

    $sentencia->execute(array(':dato1' => $parametros[0]));

    while ($resultado = $sentencia->fetch()){
        echo "Campo 1: $resultado[0]  Campo 2: $resultado[1]<br/>";
    }
    //cierro el statement y la base de datos.
    $sentencia->closeCursor();

}

?>
    <label for="bd">Base de datos: <input type="text" name="bd" id="bd"/></label><br/>
    <label for="usuario">Usuario: <input type="text" name="usuario" id="usuario"/></label><br/>
    <label for="password">Contraseña: <input type="password" name="password" id="password"/></label><br/>
    <input type="submit" value="Conectar" name="conectar"/>
</form>
<?php

if (isset($_POST['conectar'])){

$bd = $_POST['bd'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$conexion = conectar($bd, $usuario, $password);

?>
<fieldset>
    <legend>Opciones</legend>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="submit" value="Select" name="select"/>
        <input type="submit" value="Insert" name="insert"/> <br/>
    <?php
}

if (isset($_POST['select'])) : ?>
    <label for="bd">Tabla a consultar:  <input type="text" name="tabla" id="tabla"/></label><br/>
    <input type="submit" value="Consultar" name="consultar"/> <br/>
<?php endif;
    if (isset($_POST['consultar'])) echo "consultar";
?>
    </form>
</fieldset>
</body>
</html>