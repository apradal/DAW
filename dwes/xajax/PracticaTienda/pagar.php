<?php
require('Cesta.php');
require_once('Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = '/var/web/smarty/tienda/templates/';
$smarty->compile_dir = '/var/web/smarty/tienda/templates_c/';
$smarty->config_dir = '/var/web/smarty/tienda/configs/';
$smarty->cache_dir = '/var/web/smarty/tienda/cache/';

//recogemos de la sesion la cesta, NOTA: hay que añadir el require y la clase de la que viene o no recoge bien el objeto
session_start();
$cesta = $_SESSION['cesta'];

if (isset($_POST['comprar'])){

    $smarty->assign('pagar', true);
    session_unset();
    header("refresh:3;url = login.php");

}

$smarty->assign("usuario",$_SESSION['usuario']);
$smarty->assign('cesta', $cesta);
$smarty->display('pagar.tpl');

?>