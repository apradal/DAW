<?php
include ('BD.php');
include ('logoff.php');
include ('Cesta.php');
require_once('Smarty.class.php');
// Recuperamos la información de la sesión
session_start();
// Y comprobamos que el usuario se haya autentificado,
// para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])){
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

// Cargamos la librería de Smarty
$smarty = new Smarty;

$smarty->template_dir = '/var/web/smarty/tienda/templates/';
$smarty->compile_dir = '/var/web/smarty/tienda/templates_c/';
$smarty->config_dir = '/var/web/smarty/tienda/configs/';
$smarty->cache_dir = '/var/web/smarty/tienda/cache/';

$smarty->assign("usuario",$_SESSION['usuario']);
$smarty->assign("productos", BD::obtieneProductos());

//cargo la cesta en una variable y si es nulo la creo, si no trabajo con ella.
$cesta = Cesta::cargaCesta();
if ($cesta == null){
    $cesta = new Cesta();
    $cesta->guardaCesta();
}

//cada vez que añadimos a cesta
if (isset($_POST['añadir'])){

    $cod =  $_POST['cod'];
    $cesta->nuevoArticulo($cod);

}

//indica si se ha pulsado el icono x de la cesta, no se por que pero hace falta indicar X e Y
if  ($_POST['eliminar_x'] && $_POST['eliminar_y']) {

    $codigo = $_POST['codigo'];
    $cesta->borrar($codigo);

}

if (isset($_POST['vaciar'])){

    $cesta->vaciar();

}

if (isset($_POST['pagar'])){
    
    header("Location: ./pagar.php");
    exit;

}

$smarty->assign('cesta', $cesta);
$smarty->display("productos.tpl");

?>