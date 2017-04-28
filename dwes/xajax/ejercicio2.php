<?php
//cargo la libreria ajax
require ('xajax_core/xajax.inc.php');

//creo el objeto ajax (necesario)
$ajax = new xajax();

//permito que se pueda debugear.
//$ajax->configure('debug', true);

//Estas funciones podrán ser invocadas de forma asíncrona desde el cleinte
$ajax->register(XAJAX_FUNCTION, 'maxTres');

//Este método procesará las llamadas que reciba la página  ????
//Imporante llamarla antes de que el guión genere ningúna salida.
$ajax->processRequest();

//La librería necesita generar código java script en la página que envíamos al cliente
$ajax->printJavascript();

//metodos que seran llaamados por ajax
function maxTres($datos){

    //hay que crear una respuesta
    $respuesta = new xajaxResponse();
    //meto en una variable el dato recogido.
    $nombre = $datos['nombre'];
    $error = (strlen($nombre) < 3) ? '<span class="error">Mínimo 3 caracteres</span>' : "";
    //asigno lo que devuelvo, que es añadir html al id resultado
    $respuesta->assign('nombreCheck', 'innerHTML', $error);
    return $respuesta;

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Probando xajax</title>
    <script type="text/javascript" src="comprobaciones.js"></script>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<form id='formulario' action="javascript:void(null);" onsubmit="comprobarForm();">
    <label for="Nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <span id="nombreCheck"></span>
    <input type="submit" value="Enviar" name="enviar">
</form>
</body>
</html>

