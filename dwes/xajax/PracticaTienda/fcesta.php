<?php
//cargo la libreria ajax
require ('xajax_core/xajax.inc.php');
//preguntar por que peta si quitamos poner include o require sin once
include_once ('Cesta.php');
include_once ('Producto.php');

//creo el objeto ajax (necesario)
$ajax = new xajax();

////Estas FUNCIONES podrán ser invocadas de forma asíncrona desde el cleinte
$ajax->register(XAJAX_FUNCTION, 'vaciar');
$ajax->register(XAJAX_FUNCTION, 'add');
$ajax->register(XAJAX_FUNCTION, 'eliminar');
$ajax->register(XAJAX_FUNCTION, 'inicial');

//Este método procesará las llamadas que reciba la página  ????
//Imporante llamarla antes de que el guión genere ningúna salida.
$ajax->processRequest();

//La librería necesita generar código java script en la página que envíamos al cliente
$ajax->printJavascript();

//FUNCIONES AJAX
function vaciar(){

    session_start();
    unset($_SESSION['cesta']);

    //hay que crear una respuesta
    $respuesta = new xajaxResponse();
    //creo lo que quiero imprimir
    $html = 'Productos eliminados';
    //asigno lo que devuelvo, que es añadir html al id resultado
    $respuesta->assign('pcesta', 'innerHTML', $html);
    return $respuesta;

}

function add($codigo){

    //cargamos la cesta de la sesion y si no existe la creo.
    $cesta = Cesta::cargaCesta();
    if ($cesta == null){
        $cesta = new Cesta();
        $cesta->guardaCesta();
    }
    //meto el articulo en la cesta.
    $cesta->nuevoArticulo($codigo);

    $html = imprime($cesta);

    //hay que crear una respuesta
    $respuesta = new xajaxResponse();
    //asigno lo que devuelvo, que es añadir html al id resultado
    $respuesta->assign('pcesta', 'innerHTML', $html);
    return $respuesta;

}

function eliminar($codigo){

    $cesta = Cesta::cargaCesta();
    if ($cesta == null){
        $cesta = new Cesta();
        $cesta->guardaCesta();
    }
    $cesta->borrar($codigo);

    $html = imprime($cesta);

    //hay que crear una respuesta
    $respuesta = new xajaxResponse();
    //asigno lo que devuelvo, que es añadir html al id resultado
    $respuesta->assign('pcesta', 'innerHTML', $html);
    return $respuesta;

}

function imprime($cesta){

    //recojo el array de objetos productos de la cesta
    $productos = $cesta->getProductos();
    //recorro los objetos para sacar los datos en arrays planos.
    foreach ($productos as $producto) {
        $codigos[] = $producto->getCodigo();
        $precios[] = $producto->getPvp();
    }
    //recorro el array de unidades para sacar el valor que me pide su codigo.
    foreach ($codigos as $codigo) {
        $unidades[] = $cesta->getUnidades($codigo);
    }

    $html = '<ul>';

    if ($productos == null){
        $html .= "<p>Productos: 0</p>";
    }else{

        for ($i = 0; $i < count($codigos); $i++){
//            OJO!!! si la funcion onsubmit, onclick, etc llama a una funcion de js con parametros de tipo str, hay que hacer que imprima comillas internas
//            ejemplo('soyUnaStr')
            $html .= "<form action='javascript:void(null);' onsubmit=eliminarProducto('$codigos[$i]');>";

            $html .= <<<TABLA
            <li>$unidades[$i]</li>
            <li>$codigos[$i]</li>
            <li>$precios[$i]</li>
            <input type="hidden" name="codigo" value="$codigos[$i]"/>
            <li><input type="image" src="img/glyphicons-208-remove.png" border="0" alt="Submit" name="eliminar"/></li>
            </form>
TABLA;

        }

        $html .= "</ul><p>Total: " .$cesta->coste() . "</p>";

        $html .= <<<BOTONES
        <div id="juntos">
            <form id='formulario' action="javascript:void(null);" onsubmit="vaciarCesta();">
                <input type="submit" name="vaciar" value="Vaciar"/>
            </form>
            <form action="productos.php" id="pagar" method="post">
                <input type="submit" name="pagar" value="Pagar"/>
            </form>
        </div>
BOTONES;


    }

    return $html;

}

function inicial(){

    //cargo la cesta para saber si tiene objetos.
    $cesta = Cesta::cargaCesta();
    if ($cesta == null){
        $cesta = new Cesta();
        $cesta->guardaCesta();
    }

    $html = imprime($cesta);

    //hay que crear una respuesta
    $respuesta = new xajaxResponse();
    //asigno lo que devuelvo, que es añadir html al id resultado
    $respuesta->assign('pcesta', 'innerHTML', $html);
    return $respuesta;

}

?>