<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .texto{
            width: 700px;
            height: 350px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" value="Directorio actual" name="actual"/><br/>
    <input type="submit" value="Listar directorio con readDir" name="listar"/><br/>
    <input type="submit" value="Listar directorio con scanDir" name="listar2"/><br/>
    <label for="cambiar">Cambiar directorio: </label><select name="cambiar">
        <?php
            $listar = scandir(getcwd());
            foreach ($listar as $list){
                echo '<option value='.$list.'>'.$list.'</option><br>';
            }
        ?>
    </select>
    <input type="submit" value="Cambiar" name="cambiare"/><br/>
</form><br/>
<div class="texto">
<?php
echo ($_POST['actual']) ? 'Directorio actual: ' . getcwd() : '';
if ($_POST['listar']) {
    $openDir = opendir(getcwd());
    while (($file = readdir($openDir)) !== false) {
        echo "nombre archivo: $file : tipo archivo: " . filetype($file) . "<br/>";
    }
    closedir($dh);
}
if ($_POST['listar2']){
    $scan = scandir(getcwd());
    foreach ($scan as $value){
        echo 'Nombre de archivo: ' . $value . ' y su tipo es: ' . filetype($value) .'<br/>';
    }
}
echo ($_POST['cambiare']) ? 'Cambiado a directorio: ' . $list : '' ;
?>
</div>
</body>
</html>