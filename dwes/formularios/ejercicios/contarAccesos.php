<?php
$acceso = false;

if ($_POST['send']) {
    $acceso = $_POST['acceso'];
    $acceso++;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <?php echo $acceso ? 'Número de veces que se accede a la página: ' . $acceso : '' ?>
        <form method="post">
            <input type="hidden" value="<?php echo $acceso ? $acceso : 0 ?>" name="acceso"/>
            <input type="submit" name="send" value="Enviar"/>
        </form>
    </body>
</html>