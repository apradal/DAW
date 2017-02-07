<?php
session_start();
if (isset($_POST['preferencias'])) {
    $_SESSION['idioma'] = $_POST['idiomas'];
    $_SESSION['perfil'] = $_POST['perfiles'];
    $_SESSION['zona'] = $_POST['zonas'];
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
    <?php if (isset($_POST['preferencias'])) echo "<p>Información guardada en la sesión</p>" ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="idioma">Idioma:</label>
        <select name="idiomas" id="idiomas">
            <?php
                if (isset($_SESSION['idioma']) && $_SESSION['idioma'] == "espanol"){
                    echo "<option value=\"espanol\" selected>Español</option>";
                } else {
                    echo "<option value=\"espanol\">Español</option>";
                }
                if (isset($_SESSION['idioma']) && $_SESSION['idioma'] == "ingles"){
                    echo "<option value=\"ingles\" selected>Ingles</option>";
                } else {
                    echo "<option value=\"ingles\">Ingles</option>";
                }
            ?>
        </select><br/>
        <label for="perfil">Perfil público:</label>
        <select name="perfiles" id="perfiles">
            <?php
                if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == "si"){
                    echo "<option value=\"si\" selected>si</option>";
                } else {
                    echo "<option value=\"si\">si</option>";
                }
                if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == "no"){
                    echo "<option value=\"no\" selected>no</option>";
                } else {
                    echo "<option value=\"no\">no</option>";
                }
            ?>
        </select><br/>
        <label for="zona">Zona horaria:</label>
        <select name="zonas" id="zonas">
            <?php
                if (isset($_SESSION['zona']) && $_SESSION['zona'] == "gmt-2"){
                    echo "<option value=\"gmt-2\" selected>GMT-2</option>";
                } else {
                    echo "<option value=\"gmt-2\">GMT-2</option>";
                }
                if (isset($_SESSION['zona']) && $_SESSION['zona'] == "gmt-1"){
                    echo "<option value=\"gmt-1\" selected>GMT-1</option>";
                } else {
                    echo "<option value=\"gmt-1\">GMT-1</option>";
                }
                if (isset($_SESSION['zona']) && $_SESSION['zona'] == "gmt"){
                    echo "<option value=\"gmt\" selected>GMT</option>";
                } else {
                    echo "<option value=\"gmt\">GMT</option>";
                }
                if (isset($_SESSION['zona']) && $_SESSION['zona'] == "gmt+1"){
                    echo "<option value=\"gmt+1\" selected>GMT+1</option>";
                } else {
                    echo "<option value=\"gmt+1\">GMT+1</option>";
                }
                if (isset($_SESSION['zona']) && $_SESSION['zona'] == "gmt+2"){
                    echo "<option value=\"gmt+2\" selected>GMT+2</option>";
                } else {
                    echo "<option value=\"gmt+2\">GMT+2</option>";
                }
            ?>
        </select><br/>
        <input type="submit" value="Establecer preferencias" name="preferencias"/><br/>
    </form>
    <a href="./mostar.php">Mostrar preferencias</a>
</fieldset>
</body>
</html>