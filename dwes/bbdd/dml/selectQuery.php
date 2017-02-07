<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Select</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
    //conectar a base de datos
    $host="localhost";
    $usuario="root";
    $pass="tonito22";
    $nombreBD="dwes";
    $miConexion = new mysqli($host,$usuario,$pass,$nombreBD);
    $select = "SELECT * FROM familia";
    if (isset($_POST['select'])){
        $resultado = $miConexion->query($select);
        if ($resultado){
            echo "El select ha devuelto $resultado->num_rows filas y $resultado->field_count columnas<br/>";
            //metodo fetch_row que devuelve array indexado.
            $filas = $resultado->fetch_row();
            echo "<h2>Fetch_Row</h2>";
            while ($filas){
                for ($i = 0;$i<count($filas);$i++){
                    echo $filas[$i] . "   ";
                }
                echo "<br/>";
                $filas = $resultado->fetch_row();
            }
            //metodo fetch_assoc
            echo "<h2>Fetch_Assoc</h2>";
            $resultado = $miConexion->query($select);
            while ($filas = $resultado->fetch_assoc()){
                echo $filas["cod"] . "    " . $filas['nombre'] . "<br/>";
            }
            //metodo fetch_array
            echo "<h2>Fetch_Array</h2>";
            $resultado = $miConexion->query($select);
            echo "<h3>Fetch array indexdo</h3>";
            while ($filas = $resultado->fetch_array()){
                echo $filas[0] . "    " . $filas[1] . "<br/>";
            }
            $resultado = $miConexion->query($select);
            echo "<h3>Fetch array asociativo</h3>";
            while ($filas = $resultado->fetch_array()){
                echo $filas["cod"] . "    " . $filas['nombre'] . "<br/>";
            }
        } else {
            echo "Error: " . $miConexion->error;
        }
        $resultado->free();
        $miConexion->close();
    }
    ?>
    <input type="submit" value="Select" name="select"/>
</form>
</body>
</html>