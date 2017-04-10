<?php
spl_autoload_register(function ($clase) {
    require_once "$clase.php";}
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestionar tablas</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<main>
<?php
session_start();
//recojo datos necesarios
$table = $_GET['table'];
if (isset($_GET['table'])){
    $_SESSION['table'] = $table;
}
$database = $_SESSION['database'];
$option = $_POST['gestionar'];
$campos = $_POST['campo'];

//si conecto
if ($conexion = bd::conectar($_SESSION['host'],$_SESSION['user'],$_SESSION['pass'],$database)):

//comprobamos si se a seleccionado alguna opción para reenviarnos a su página correspondiente o imprimimos la página con las filas.
if (isset($_POST['gestionar'])){
    //segun la opcion
    switch ($option){
        case 'Add':
            header("Location:insertar.php?table=".$_SESSION['table']);
            exit();
            break;
        case 'Edit':
            header("Location:editar.php?table=".$_SESSION['table']."&column=".$_POST['column']."&value=".$campos[0]);
            exit();
            break;
        case 'Del':
            //aqui funcion borrar
            $table = $_POST['table'];
            if (bd::deleteRow($conexion,$table,$_POST['column'],$campos[0])){
                echo '<div class="resultado">';
                echo '<span class="correcto">Registro eliminado</span>';
                echo '</div>';
                header("Refresh:3; url=./gestionarTabla.php?table=" . $table);
            }else{
                echo '<div class="resultado">';
                echo '<span class="correcto">Imposible de borrar, compruebe el error</span>';
                echo '</div>';
                header("Refresh:3; url=./gestionarTabla.php?table=" . $table);
            };
            exit();
            break;
        case 'Close':
            //volver atras
            $database = $_SESSION['database'];
            header("Location:tablas.php?database=$database");
            exit();
            break;
    }
}
?>
<fieldset>
    <legend class="title">Administración de la tabla <?php echo $table ?></legend>
    <?php
    //recoger el valor de los campos de columna
    $columns = bd::getColumsnName($conexion,$table);
    //recoger todas las filas de la tabla
    $filas = bd::selectAllTable($conexion,$table);
    ?>
    <table id="table">
        <thead>
            <tr>
                <?php
                    foreach ($columns as $valor){
                        echo "<th>" . $valor . "</th>";
                    }
                ?>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //imprimir todas las filas.
            foreach ($filas as $fila){
                echo "<tr>";
                echo '<form action="gestionarTabla.php" method="post">';
                for ($i = 0; $i < count($fila)/2; $i++){
                    echo "<td>$fila[$i]</td>";
                    echo '<input type="hidden" name="campo[' . $i . ']" value="' . $fila[$i] . '"/>';
                }
                echo '<td><input class="btn2" type="submit" value="Edit" name="gestionar" id="table"/></td>';
                echo '<td><input class="btn2" type="submit" value="Del" name="gestionar" id="table"/></td>';
                echo '<input type="hidden" name="column" value="'. $columns[0] .'"/>';
                echo '<input type="hidden" name="table" value="'. $table .'"/>';
                echo '</form>';
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    <br/>
    <form action="gestionarTabla.php" method="post">
        <input class="btn" type="submit" value="Add" name="gestionar"/>
        <input class="btn" type="submit" value="Close" name="gestionar"/>
    </form>
</fieldset>
<?php
endif;
?>
</main>
</body>
</html>