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

function consulta(PDO $conexion,$sentencia,$columnas,$parametros){

    try{

        $select = $conexion->prepare($sentencia);
        $select->execute($parametros);
        $result = [];

        while ($resultado = $select->fetch()){
            for ($i = 0; $i < $columnas; $i++){
                $temp[] = $resultado[$i];
            }
            array_push($result,$temp);
            $temp = [];
        }

        return $result;

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
<div id="encabezado">
    <h1>Tarea: Edición de un producto</h1>
</div>
<div id="contenido">
    <h2>Producto:</h2>
    <?php

    $producto = $_POST['nombre'];

    if (isset($producto)):

        //llamamos al metodo conectar y le pasamos los parametros.
        $conexion = conectar("root","tonito22","dwes");

        if ($conexion):

            //creo la sentencia para sacar los datos del producto con familia seleccionada.
            $sentencia = "SELECT nombre_corto, nombre, descripcion, PVP FROM producto WHERE nombre_corto = :nombre";
            $parametros = [":nombre" => $producto];
            $resultado = consulta($conexion,$sentencia,4,$parametros);

            if ($resultado):
    ?>
            <form action="actualizar.php" method="post">
                <label for="nombrec">Nombre corto:</label>
                <input type="text" name="nombrec" id="nombrec" value="<?php echo $resultado[0][0] ?>"><br/>
                <label for="nombre">Nombre:</label><br/>
                <textarea rows="4" cols="50" name="nombre"><?php echo $resultado[0][1] ?></textarea><br/>
                <label for="descripcion">Descripción:</label><br/>
                <textarea rows="4" cols="50" name="descripcion"><?php echo utf8_encode($resultado[0][2]) ?></textarea><br/>
                <label for="pvp">PVP:</label>
                <input type="text" name="pvp" id="pvp" value="<?php echo $resultado[0][3] ?>"><br/>
                <input type="hidden" name="oldname" value="<?php echo $resultado[0][0] ?>"/>
                <input type="submit" value="Actualizar" name="actualizar"/>
                <input type="submit" value="Cancelar" name="cancelar"/><br/>
            </form>
    <?php
            endif;
        endif;
    endif;
    $resultado->close();
    ?>
</div>
</body>
</html>