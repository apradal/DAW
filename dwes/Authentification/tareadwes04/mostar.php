<?php
session_start();
if (isset($_POST['borrar'])){
    session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<fieldset>
    <legend>Preferencias</legend>
    <?php if (isset($_POST['borrar'])) echo "<p>Información de la sesión eliminada</p><br/>" ?>
    <label for="idioma">Idioma: </label><br/>
    <?php echo $_SESSION['idioma'] . "<br/>" ?>
    <label for="perfil">Perfil público: </label><br/>
    <?php echo $_SESSION['perfil'] . "<br/>" ?>
    <label for="zona">Zona horaria: </label><br/>
    <?php echo $_SESSION['zona'] . "<br/>" ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="submit" name="borrar" value="Borrar preferencias"/>
    </form>
    <a href="./preferencias.php">Establecer preferencias</a>
</fieldset>
</body>
</html>