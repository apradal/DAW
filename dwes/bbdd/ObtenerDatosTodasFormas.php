<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Conectar a base de datos</h1>
<?php

function conectar($usuario,$password){

    $host = "localhost";
    $bd = "dwes";
    $user = $usuario;
    $pass = $password;

    $miConexion = new mysqli($host,$user,$pass,$bd);

    return $miConexion;

}

if (!isset($_POST['conectar']) && !isset($_POST['array']) && !isset($_POST['assoc']) && !isset($_POST['row']) && !isset($_POST['object'])):
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    Usuario: <input type="text" name="usuario"/><br/>
    Password: <input type="password" name="pass"><br/>
    <input type="submit" value="Conectar" name="conectar"/><br/>
</form>
<?php
endif;
?>
<?php
if (isset($_POST['conectar'])){

    $user = $_POST['usuario'];
    $pass = $_POST['pass'];

    $miConexion = conectar($user,$pass);

    $error = $miConexion->connect_error;

    if (!$error) {
        echo '<p>Conectado</p>';
    }
}
if (isset($_POST['conectar']) && $error == null):
?>
    Selecciona una opción para sacar los datos de la tabla familia de la bbdd dwes.
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <br/><input type="submit" value="fetch_array" name="array"/>
        <input type="submit" value="fetch_assoc" name="assoc"/>
        <input type="submit" value="fetch_row" name="row"/>
        <input type="submit" value="fetch_object" name="object"/><br/>
        <input type="hidden" name="usuario" value="<?php echo $user ?>"/>
        <input type="hidden" name="password" value="<?php echo $pass ?>"/>
    </form>
<?php
endif;
if (isset($_POST['array'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $select = "SELECT * FROM familia";
    $miConexion = conectar($usuario,$password);
    $resultado = $miConexion->query($select);
    if ($resultado){
        echo "El select ha devuelto $resultado->num_rows filas y $resultado->field_count columnas<br/>";
        while ($filas = $resultado->fetch_array()){
            $str = "";
            for ($i = 0; $i < count($filas); $i++){
                $str .= " " . $filas[$i];
            }
            $str .= "<br/>";
            echo $str;
        }
    }
}
if (isset($_POST['assoc'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $select = "SELECT * FROM familia";
    $miConexion = conectar($usuario,$password);
    $resultado = $miConexion->query($select);
    if ($resultado){
        echo "El select ha devuelto $resultado->num_rows filas y $resultado->field_count columnas<br/>";
        while ($filas = $resultado->fetch_assoc()){
            echo $filas["cod"] . "    " . $filas['nombre'] . "<br/>";
        }
    }
}
if (isset($_POST['row'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $select = "SELECT * FROM familia";
    $miConexion = conectar($usuario,$password);
    $resultado = $miConexion->query($select);
    if ($resultado){
        echo "El select ha devuelto $resultado->num_rows filas y $resultado->field_count columnas<br/>";
        $filas = $resultado->fetch_row();
        while ($filas){
            for ($i = 0;$i<count($filas);$i++){
                echo $filas[$i] . "   ";
            }
            echo "<br/>";
            $filas = $resultado->fetch_row();
        }
    }
}
if (isset($_POST['object'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $select = "SELECT * FROM familia";
    $miConexion = conectar($usuario,$password);
    $resultado = $miConexion->query($select);
    if ($resultado){
        echo "El select ha devuelto $resultado->num_rows filas y $resultado->field_count columnas<br/>";
        while ($filas = $resultado->fetch_object()){
            echo $filas->{'cod'} . "    " . $filas->{'nombre'} . "<br/>";
        }
    }
}
$resultado->free();
$miConexion->close();
?>
</body>
</html>