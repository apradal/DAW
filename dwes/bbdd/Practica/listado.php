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
        echo  " Motivo: $p";
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
    <h1>Tarea : Listado de productos de una familia</h1>
    <?php
    //llamamos al metodo conectar y le pasamos los parametros.
    $conexion = conectar("root","tonito22","dwes");
    //si la conexion ha sido exitosa prodecemos a imprimir las familias.
    if ($conexion):
    //sentencia select que va a ser pasada (sin parametros)
    $sentencia = "SELECT cod FROM familia";
    //array con el resultado de todas las filas.
    $resultado = consulta($conexion,$sentencia,1);
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="familia">Familia: </label>
        <select name="familia" id="familia">
            <?php
            //imprimo todos los resultados
            foreach ($resultado as $item => $codigo):
                ?>
                <option value="<?php echo $codigo[0] ?>"><?php echo $codigo[0] ?></option>
                <?php
            endforeach;
            ?>
        </select>
        <input type="submit" value="Mostrar productos" name="mostrar"/>
    </form>
</div>
<div id="contenido">
    <?php
    endif;
    if (isset($_POST['mostrar'])):
        //recojo el valor de la familia seleccionada
        $familia = $_POST['familia'];
        //creo la sentencia para sacar los datos del producto con familia seleccionada.
        $sentencia = "SELECT nombre_corto, PVP FROM producto WHERE familia = :familia";
        $parametros = [":familia" => $familia];
        $resultado = consulta($conexion,$sentencia,2,$parametros);

        ?>
        <h2>Prodcutos de familia:</h2>
        <?php
            foreach ($resultado as $item => $producto):
        ?>
                <form action="editar.php" method="post">
                    Producto: <?php echo $producto[0] ?>: <?php echo $producto[1] ?> euros
                    <input type="hidden" name="nombre" value="<?php echo $producto[0] ?>"/>
                    <input type="submit" value="Editar" name="editar"/><br/>
                </form>
        <?php
            endforeach;
        ?>
    <?php
    endif;
    $resultado->close();
    ?>
</div>
</body>
</html>