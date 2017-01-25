<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*
     Simplemente cargo la página correspondiente según la opción seleccionada
    */
if ($_POST['procesar'])
    header("Location:./".$_POST['procesar'].".php");
?>
<body>
<h1> ejercicio 1</h1>
<form action="index.php" method="post">
    <input type ="submit"  value="acceder" name="procesar">
    <input type ="submit"  value="registrarse" name="procesar">
</form>
</body>
</html>