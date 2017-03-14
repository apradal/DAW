<?php
require "ConectarInsertSelect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="usuario">Usuario: </label><input type="text" name="usuario" id="usuario"><br/>
    <label for="password">Password: </label><input type="password" name="password" id="password"><br/>
    <label for="bbdd">BBDD: </label><input type="text" name="bbdd" id="bbdd"><br/>
    <input type="submit" name="conectar" value="Conectar"/>
</form>
<?php
if (isset($_POST['conectar'])):
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $bbdd = $_POST['bbdd'];
    $conexion = ConectarInsertSelect::conectar($usuario,$password,$bbdd);
    if ($conexion){
        echo 'conectado';
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $password;
        $_SESSION['bd'] = $bbdd;
    } else {
        echo 'Ooops, error al conectar';
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="select" value="select"/>
    <input type="submit" name="insert" value="insert"/>
</form>
<?php
endif;
if (isset($_POST['select'])){

    session_start();
    $sentencia = 'SELECT producto, unidades FROM stock WHERE unidades < :dato1 AND tienda = :dato2';
    $parametros = [":dato1" => 2, ":dato2" => 1];
    ConectarInsertSelect::consulta($_SESSION['usuario'],$_SESSION['password'],$_SESSION['bd'],$sentencia,$parametros);
}

if (isset($_POST['insert'])){

    session_start();
    $sentencia = 'INSERT INTO familia (cod, nombre) VALUES (:cod, :nombre)';
    $parametros = [":cod" => "Pantalon", ":nombre" => "Levis"];
    ConectarInsertSelect::insertar($_SESSION['usuario'],$_SESSION['password'],$_SESSION['bd'],$sentencia,$parametros);

}
?>
</body>
</html>