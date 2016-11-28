<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if ($_POST['send']){
    $acceso = $_POST['acceso'];
    echo 'Número de veces que se accede a la página: ' . $acceso;
    $acceso++;
}
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" value="<?php echo $acceso ?>" name="acceso"/>
    <input type="submit" name="send" value="Enviar"/>
</form>
</body>
</html>