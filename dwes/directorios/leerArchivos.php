<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
//metodo 1 sin crear objeto dir
$dir = "/var/www/DWES/uploads/";

// Abre un directorio conocido, y procede a leer el contenido
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "nombre archivo: $file : tipo archivo: " . filetype($dir . $file) . "<br/>";
        }
        closedir($dh);
    }
}
?>
<?php
//metodo 2 creando objeto dir
$directorio = dir("/var/www/DWES/uploads");

while ($archivo = $directorio -> read()){
    echo "nombre archivo: $archivo tipo de archivo: " . filetype($dir.$archivo). "<br/>";
}
$directorio -> close();
?>
</body>
</html>