<?php
function conectar(){

    $user = "root";
    $pass = "tonito22";
    $bd = "dwes";
    $host = "localhost";

    $miConexion = new mysqli($host,$user,$pass,$bd);

    $error = $miConexion->connect_error;

    if ($error){
        return false;
    } else {
        return $miConexion;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .tiendas {
            background-color: beige;
            width: 1000px;
            float: left;
        }
        .tienda {
            width: 300px;
            float: left;
        }

    </style>
</head>
<body>
<h1>Productos disponibles en cada tienda</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    Producto:
    <select name="producto" id="producto">
    <?php

    $miConexion = conectar();
    if ($miConexion){

        $selectProductos = $miConexion->stmt_init();
        $selectProductos->prepare('SELECT nombre_corto FROM producto');
        $selectProductos->execute();
        $selectProductos->bind_result($producto);

        while ($selectProductos->fetch()):
    ?>
            <option value="<?php echo $producto ?>"><?php echo $producto ?></option>
    <?php
    endwhile;
        $selectProductos->close();
    }
    ?>
    </select>
    <input type="submit" value="Consultar" name="consultar"/><br/>
</form>
<?php
if ($_POST['consultar']){
    //para sacar el codigo de producto
    $producto = $_POST['producto'];
    $codigoProducto = $miConexion->stmt_init();
    $codigoProducto->prepare("SELECT cod FROM producto WHERE nombre_corto=?");
    $codigoProducto->bind_param("s", $producto);
    $codigoProducto->execute();
    $codigoProducto->bind_result($codigo);
    $codigoProducto->fetch();
    $codigoProducto->close();

    //1 = central, 2= sucursal1, 3= sucursal2
    //sabiendo ya el codigo sacar todas las unidades
    //arrays donde guardare los datos de cada tieda
    $central = [];
    $sucursal1 = [];
    $sucursal2 = [];
    $unidadesProdcuto = $miConexion->stmt_init();
    $unidadesProdcuto->prepare("SELECT producto, tienda, unidades FROM stock WHERE producto=?");
    $unidadesProdcuto->bind_param("s", $codigo);
    $unidadesProdcuto->execute();
    $unidadesProdcuto->bind_result($nombre, $tienda, $unidades);
    while ($unidadesProdcuto->fetch()){

        switch ($tienda){
            case 1:
                $central[] = [$nombre, $unidades];
                break;
            case 2:
                $sucursal1[] = [$nombre, $unidades];
                break;
            case 3:
                $sucursal2[] = [$nombre, $unidades];
                break;
        }

    }
}
if (isset($_POST['consultar'])):
?>
    <div class="tiendas">
        <div class="tienda">
            <h2>Central</h2>
            <?php
                foreach ($central as $valor => $item){
                    echo "<p>Producto: $item[0], Unidades $item[1]</p>";
                }
            ?>
        </div>
        <div class="tienda">
            <h2>Sucursal 1</h2>
            <?php
            foreach ($sucursal1 as $valor => $item){
                echo "<p>Producto: $item[0], Unidades $item[1]</p>";
            }
            ?>
        </div>
        <div class="tienda">
            <h2>Sucursal 2</h2>
            <?php
            foreach ($sucursal2 as $valor => $item){
                echo "<p>Producto: $item[0], Unidades $item[1]</p>";
            }
            ?>
        </div>
    </div>
<?php
endif;
?>
</body>
</html>