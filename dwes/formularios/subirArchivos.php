<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
//ruta del fichero y su nombre en el directorio por defecto donde guarda apache
$origen = $_FILES['fichero']['tmp_name'];
//nombre del fichero
$nombreFichero = $_FILES['fichero']['name'];
//ruta del fichero en la carpeta destino con el nombre del fichero
$destino = '/var/www/DWES/uploads/'.$nombreFichero;
//error que se devuelve
$error = $_FILES['fichero']['error'];
//tamaño del fichero subido
$size = $_FILES['fichero']['size'];
//tipo de fichero
$type = $_FILES['fichero']['type'];

//funcion para saber el tipo de fichero y meterlo en su directorio
function comprobarTipo($type){
    $tipo = explode('/',$type);
    switch ($tipo[0]){
        case 'audio':
            $ruta = '/var/www/DWES/uploads/music/';
            break;
        case 'image':
            $ruta = '/var/www/DWES/uploads/images/';
            break;
        default:
            $ruta = '/var/www/DWES/uploads/others/';
    }
    return $ruta;
}

//funcion comprobacion de error al subir fichero
function comprobarError($error){
    switch ($error){
        case 0:
            echo "Fichero subido de forma correcta. <br />";
            break;
        case 1:
            echo "ERROR. Tamaño de fichero superior al establecido en el servidor <br />";

            break;
        case 2:
            echo "ERROR. Tamaño de fichero superior al establecido en cliente<br />";
            echo "El tamaño se estableció en el input MAX_FILE_SIZE<br/>";
            echo "Tamaño establecido ".$_POST['MAX_FILE_SIZE']."<br/>";
            break;
        case 3:
            echo "ERROR. EL fichero sólo se subió parcialmente <br/>";
            break;
        case 4:
            echo "ERROR. No se subió ningún fichero <br/>";
            break;
        case 6:
            echo "ERROR. No se encuentra la carpeta temporal <br/>";
            break;
        case 7:
            echo "ERROR. No se pudo escribir en disco. revisa permisos <br/>";
            break;
        case 8:
            echo "ERROR. Una extensión de php detuvo la subida del fichero <br/>";
            break;
        default:
            echo "Valor de error desconocido";
    }
}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000"> <!--limita el tamaño del fichero a subir (aun que creo que predomina el del php.ini)-->
    <label for="file">Subir fichero: </label><input type="file" name="fichero" id="file"/><br/>
    <input type="submit" value="Enviar" name="send"/>
</form></br>
<?php
echo 'nombre del fichero en servidor (tmp): <b>'.$origen.'</b><br/><br/>';
echo 'nombre del fichero en cliente: <b>'.$nombreFichero.'</b><br/><br/>';
echo 'ruta completa con nombre de fichero donde se guarda: <b>'.$destino.'</b><br/><br/>';
echo 'Error devuelto por el servidor (0 es que se ha subido OK): <b>'.$error.'</b><br/><br/>';
echo 'Lo que ocupa el fichero: <b>'.$size.'</b><br/><br/>';
echo 'Tipo de fichero <b>'.$type.'</b><br/><br/>';

if ($_POST['send']){

    $destino = comprobarTipo($type).$nombreFichero;
    if (move_uploaded_file($origen,$destino)){
        comprobarError($error);
    }
}
?>
</body>
</html>