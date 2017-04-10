<?php
spl_autoload_register(function ($clase) {
    require_once "$clase.php";}
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar datos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<main>
<?php
//recojo datos.
session_start();
$table = $_GET['table'];

if ($conexion = bd::conectar($_SESSION['host'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['database'])):

?>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend class="title">Insertar nuevo registro en la tabla <?php echo $table ?></legend>
        <?php
            $columns = bd::getColumsnName($conexion,$table);
            $_SESSION['columns'] = $columns;
            foreach ($columns as $column):
        ?>
                <label for="<?php echo $column ?>"><?php echo $column ?></label>
                <input type="text" name="<?php echo $column ?>" id="<?php echo $column ?>"/><br/>
        <?php
        endforeach;
        ?>
        <br/>
        <input class="btn" type="submit" name="save" value="Guardar"/>
        <input class="btn" type="submit" name="cancel" value="Cancelar"/>
    </fieldset>
</form>
<?php
endif;
if (isset($_POST['cancel'])){
    header("Location:gestionarTabla.php?table=".$_SESSION['table']);
    exit();
}
if (isset($_POST['save'])){

    //recojo los datos de los inputs.
    foreach ($_SESSION['columns'] as $column) {
        $values[] = $_POST["$column"];
    }
    if (bd::insertRow($conexion,$_SESSION['table'],$_SESSION['columns'],$values)){
        echo '<div class="resultado">';
        echo '<span class="correcto">Registro ingresado correctamente</span>';
        echo '</div>';
    }
}
?>
</main>
</body>
</html>