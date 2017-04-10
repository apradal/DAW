<?php
spl_autoload_register(function ($clase) {
    require_once "$clase.php";}
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar filas</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<main>
<?php
//recojo datos.
session_start();
$table = $_GET['table'];
$column = $_GET['column'];
$value = $_GET['value'];

if ($conexion = bd::conectar($_SESSION['host'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['database'])):
?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend class="title">Editar campo</legend>
            <?php
                //cojo las columnas
                $columns = bd::getColumsnName($conexion,$table);
                //cojo los datos del campo
                $datos = bd::selectRow($conexion,$table,$column,$value);
                $_SESSION['columns'] = $columns;
                for($i = 0; $i < count($columns); $i++):
            ?>
                <label for="<?php echo $columns[$i] ?>"><?php echo $columns[$i] ?></label>
                    <?php
                        if (strlen($datos[0][$i]) < 40):
                    ?>
                <input type="text" name="<?php echo $columns[$i] ?>" id="<?php echo $columns[$i] ?>" value="<?php echo $datos[0][$i] ?>"/><br/>
                    <?php
                        else:
                    ?>
                <textarea rows="4" cols="50" name="<?php echo $columns[$i] ?>" id="<?php echo $columns[$i] ?>">
                    <?php
                        echo $datos[0][$i];
                    ?>
                </textarea><br/>
                    <?php
                        endif;
                    ?>
            <?php
                endfor;
            ?>
            <br/>
            <input class="btn" type="submit" name="edit" value="Editar"/>
            <input class="btn" type="submit" name="cancel" value="Cancel"/>
        </fieldset>
    </form>
    <div class="resultado">
<?php
endif;

//si pulsan cancel o edit
if (isset($_POST['cancel'])){
    header("Location:gestionarTabla.php?table=".$_SESSION['table']);
    exit();
}
if (isset($_POST['edit'])){
    //recojo todos los input enviados y sus valores sin saber cuales son ya que a saber que tabla es y que fila.
    foreach ($_POST as $key => $value){
        $campos[$key] = $value;
    }
    //compruebo que campos de los recibidos han sido modificados de los viejos para actualizarlos.
    $changes = bd::checkUpdates($datos,$campos);
    if ($changes){
        if(bd::updateRow($conexion,$table,$changes,$columns[0],$datos[0][0])){
            echo '<span class="correcto">Registro modificado</span>';
        }
    } else {
        echo '<span class="correcto">No ha realizado ningún cambio</span>';
    }

}
?>
    </div>
</main>
</body>
</html>