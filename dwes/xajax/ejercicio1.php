<?php
//cargo la libreria ajax
require ('xajax_core/xajax.inc.php');

//creo el objeto ajax (necesario)
$ajax = new xajax();

//permito que se pueda debugear.
//$ajax->configure('debug', true);

//Estas funciones podrán ser invocadas de forma asíncrona desde el cleinte
$ajax->register(XAJAX_FUNCTION, 'calcularC');
$ajax->register(XAJAX_FUNCTION, 'calcularR');

//Este método procesará las llamadas que reciba la página  ????
//Imporante llamarla antes de que el guión genere ningúna salida.
$ajax->processRequest();

//La librería necesita generar código java script en la página que envíamos al cliente
$ajax->printJavascript();

function calcularC($datos) {
    $respuesta = new xajaxResponse();
    $num = $datos['cuadradoServidor'];
    $r = $num*$num;
    $respuesta->assign('valorC', 'innerHTML', $r);
    return $respuesta;
}

function calcularR($datos) {
    $respuesta = new xajaxResponse();
    $num=$datos['raizServidor'];
    $rtdo = sqrt($num);
    $respuesta->assign('valorR', 'innerHTML', $rtdo);
    return $respuesta;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Probando xajax</title>
    <script type="text/javascript" src="valida.js"></script>
</head>
<body>
<form id='datosC' action="javascript:void(null);" onsubmit="calcularCuadrado();">
    Calcula Cuadrado:
    <input type="text" name="cuadradoServidor" id="cuadradoCliente">
    <input type="submit" value="calcular Cuadrado" name="calcularC">
    <div id="valorC" ></div>
</form>
<hr/>

<form id='datosR' action="javascript:void(null);" onsubmit="calcularRaiz();">
    Calcula Raiz:
    <input type="text" name="raizServidor" id="raizCliente">
    <input type="submit" value="calcular Raiz" name="calcularR">
    <div id="valorR" ></div>
</form>
<hr />


</body>
</html>
