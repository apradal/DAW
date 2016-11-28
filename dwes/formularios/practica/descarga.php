<?php
/* Control de usuaio (forma cutre) */
if ((empty($_POST['usuario']) && empty($_GET['usuario'])) || (empty($_POST['password']) && empty($_GET['password'])) ){
    echo '<script>alert("ERROR: Debe introducir usuario y contraseña");</script>';
    header( "refresh:1;url=index.php" );
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
//ruta temporal donde deja el servidor el fichero con su nombre. ejemplo /tmp/phpjm4pSL
$origen = $_FILES['fichero']['tmp_name'];
//nombre del fichero. Ejemplo foto.png
$nombreFichero = $_FILES['fichero']['name'];
//error que devuelve. Ejemplo 0 es subida OK
$error = $_FILES['fichero']['error'];
//tipo de fichero para poder llevarlo a un directorio u otro. ejempplo image/jpg
$type = $_FILES['fichero']['type'];
//tamaño del fichero
$size = $_FILES['fichero']['size'];
$usuario = (empty($_POST['usuario']) ? $_GET['usuario'] : $_POST['usuario']);
$password = (empty($_POST['password']) ? $_GET['password'] : $_POST['password']);
/**
 * se le pasa el tipo para comprobar la ruta donde deve ir.
 * @param $type
 * @return string
 */
function selecRuta($type)
{
    //explode mete en un array un string cortado por lo que le indiques. .ejemplo separará images / jpg.
    $tipo = explode('/', $type);
    switch ($tipo[0]) {
        case 'image':
            $ruta = './uploads/images/';
            break;
        case 'audio':
            $ruta = './uploads/music/';
            break;
        default:
            $ruta = './uploads/others/';
    }
    return $ruta;
}

/**
 * Comprueba el error que da el fichero y devuelve un echo
 * @param $error
 */
function comprobarError($error)
{
    switch ($error) {
        case 0:
            echo "Fichero subido de forma correcta. <br />";
            break;
        case 1:
            echo "ERROR. Tamaño de fichero superior al establecido en el servidor <br />";

            break;
        case 2:
            echo "ERROR. Tamaño de fichero superior al establecido en cliente<br />";
            echo "El tamaño se estableció en el input MAX_FILE_SIZE<br/>";
            echo "Tamaño establecido " . $_POST['MAX_FILE_SIZE'] . "<br/>";
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

/**
 * Imprime todos los ficheros para el usuario
 * @param $directorio
 * @param $href
 */
function imprimirUser($directorio, $href)
{
    $scan = scandir($directorio);
    unset($scan[0]);
    unset($scan[1]);
    foreach ($scan as $dir) {
        echo '<a href=' . $href . $dir . '>' . $dir . '</a><br/>';
    }
}

/**
 * Mueve ficheros de uploads a downloads para que lo vean los usuarios
 */
function moverFichero()
{
    $ficherosOrigen = $_GET['fichero'];
    foreach ($ficherosOrigen as $fichero){
        $destino = array(explode('/', $fichero));
        $destino[0][1] = 'downloads';
        //Se necesita sacar los values del array creado por explode ya que lo crea multidimensional y con esto será array simple
        foreach ($destino as $item) {
            $item += $item;
        }
        $dest = implode('/', $item);
        //renombre ficheros pero tambien los mueve, si existe ya el destino lo sobreescribe.
        rename($fichero, $dest);
    }
}

/**
 * Imprime los ficheros de cada directorio para el admin
 * @param $directorio
 */
function imprimirAdmin($directorio)
{
    $scan = scandir($directorio);
    unset($scan[0]);
    unset($scan[1]);
    foreach ($scan as $dir) {
        echo '<input type="checkbox" name="fichero[]" value="'. $directorio . $dir . '">' . $dir . '<br/>';
    }
}
/*<<<EJECUTABLE>>>*/
/*Subida de ficheros ya sean usuarios o admin comprobando que hay fichero subido al tmp del servidor*/
if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] == 0) {
    $maxsize = 10485760;
    $minsize = 10240;
    /*Controla el tamaño dle fichero y de pesar lo correcto lo sube*/
    if(($size > $maxsize)) {
        echo '<script>alert("ERROR: El fichero excede los 10 megas");</script>';
    } elseif ($size < $minsize){
        echo '<script>alert("ERROR: El fichero es demasiado pequeño");</script>';
    } else {
        $destino = selecRuta($type) . $nombreFichero;
        if (move_uploaded_file($origen, $destino)) {
            comprobarError($error);
        }
    }
} else {
    comprobarError($error);
}
/* Cambio de ficheros usuario admin */
if ($_GET['publicar']) moverFichero();
?>
<h1>Fichero públicos</h1>
<form>
    <fieldset>
        <legend>Publicación de ficheros</legend>
        <fieldset>
            <legend>Canciones subidas</legend>
            <?php
            $directorio = './downloads/music/';
            $href = './downloads/music/';
            imprimirUser($directorio, $href);
            ?>
        </fieldset>
        <fieldset>
            <legend>Imagenes subidas</legend>
            <?php
            $directorio = './downloads/images/';
            $href = './downloads/images/';
            imprimirUser($directorio, $href);
            ?>
        </fieldset>
        <fieldset>
            <legend>Otros ficheros subidos</legend>
            <?php
            $directorio = './downloads/others/';
            $href = './downloads/others/';
            imprimirUser($directorio, $href);
            ?>
        </fieldset>
    </fieldset>
</form>
<?php if ($usuario == 'admin' && $password == 'admin') : ?>
    <h1>Administración de ficheros</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <input type="hidden" value="<?php echo $usuario ?>" name="usuario"/>
        <input type="hidden" value="<?php echo $password ?>" name="password"/>
        <fieldset>
            <legend>Publicación de ficheros</legend>
            <fieldset>
                <legend>Canciones subidas</legend>
                <?php
                $directorio = './uploads/music/';
                $href = './uploads/music/';
                imprimirAdmin($directorio);
                ?>
            </fieldset>
            <fieldset>
                <legend>Imagenes subidas</legend>
                <?php
                $directorio = './uploads/images/';
                $href = './uploads/images/';
                imprimirAdmin($directorio);
                ?>
            </fieldset>
            <fieldset>
                <legend>Otros ficheros subidos</legend>
                <?php
                $directorio = './uploads/others/';
                $href = './uploads/others/';
                imprimirAdmin($directorio);
                ?>
            </fieldset>
            <input type="submit" value="publicar" name="publicar"/>
        </fieldset>
    </form>
<?php endif;
}?>
</body>
</html>