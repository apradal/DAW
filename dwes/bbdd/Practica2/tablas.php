<?php
spl_autoload_register(function ($clase) {
    require_once "$clase.php";}
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tablas php</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<main>
<?php
$databases = json_decode($_POST['databases']);
$database = $_POST['database'];
if ($database == null){
    $database = $_GET['database'];
}
?>
<form action="index.php" method="post">
    <fieldset>
        <legend class="title">Listado de base de datos</legend>
        <input type="hidden" value="<?php echo htmlentities(json_encode($databases)) ?>" name="databases"/>
        <input class="btn" type="submit" value="Volver" name="volver"/>
    </fieldset>
</form>
<?php
if  ($database):
    session_start();
    //esta sesion se crea solo para poder usarla en gestionarTabla y poder pasarla al volver.
    $_SESSION['database'] = $database;
    if ($conexion = bd::conectar($_SESSION['host'],$_SESSION['user'],$_SESSION['pass'],$database)):
        $tables = bd::listTables($conexion);
?>
    <form action="gestionarTabla.php" method="get">
        <fieldset>
            <legend class="title">Gestios de la base de datos: <?php echo $database ?></legend>
            <select id="select" name="table" onchange="checkSelect()">
                <option selected="true" disabled="disabled">Selecciona tabla</option>
                <?php
                    foreach ($tables as $valor){
                        echo '<option value="'. $valor .'">' . $valor . '</option>';
                    }
                ?>
            </select>
            <script>
                function checkSelect() {
                    var selected = document.getElementById("select").value;
                    if (selected != null) {
                        document.getElementById("ir").disabled = false;
                    }
                }
            </script>
            <input type="hidden" name="database" value="<?php echo $database ?>"/>
            <input class="btn" type="submit" id="ir" value="Ir" name="ir" disabled/>
        </fieldset>
    </form>
<?php
    endif;
endif;
?>
</main>
</body>
</html>