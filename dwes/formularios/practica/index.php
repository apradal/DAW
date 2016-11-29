<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$user = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
?>
<h1>Descarga de ficheros</h1>
<h3>Prueba de subida github</h3>
<form action="descarga.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><b>Datos de usuario</b></legend>
        <label for="usuario">Usuario </label><input type="text" name="usuario" value="<?php echo $user ?>" id="usuario"/>
        <label for="password"> Password </label><input type="password" name="password" value="<?php echo $pass ?>" id="password"/><br/>
        <h2>Selecciona fichero</h2>
        <!-- valor oculto el cual limita el tamaño del archivo a subir a 10 megas -->
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" name="fichero"/><br/><br/>
        <input type="submit" value="Acceder" name="acceder"/>
    </fieldset>
</form>
</body>
</html>
