<?php

require_once('BD.php');
require_once('Ordenador.php');

require_once('Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = '/var/web/smarty/tienda/templates/';
$smarty->compile_dir = '/var/web/smarty/tienda/templates_c/';
$smarty->config_dir = '/var/web/smarty/tienda/configs/';
$smarty->cache_dir = '/var/web/smarty/tienda/cache/';

session_start();

if (isset($_GET['producto'])){
    //si se ha pasado el codigo de prodcuto, ataco a la bbdd para crear un objeto de ordenador.
    $ordenador = BD::obtenerOrdenador($_GET['producto']);

    $smarty->assign('ordenador', $ordenador);
    $smarty->assign('nombre', $_GET['nombre']);
    $smarty->assign('pvp', $_GET['pvp']);
    $smarty->assign('descripcion', $_GET['descripcion']);

}

$smarty->assign("usuario",$_SESSION['usuario']);
$smarty->display("descripcion.tpl");

?>