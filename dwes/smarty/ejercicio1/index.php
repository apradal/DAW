<?php
//primer ejercicio con smarty
require_once('Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = '/var/web/smarty/ejercicio1/templates/';
$smarty->compile_dir = '/var/web/smarty/ejercicio1/templates_c/';
$smarty->config_dir = '/var/web/smarty/ejercicio1/configs/';
$smarty->cache_dir = '/var/web/smarty/ejercicio1/cache/';

session_start();
if (!$_SESSION['usuario']){
    $_SESSION['usuario']=$_POST['usuario'];
    echo "Valor de usuario ".$_SESSION['usuario'];
}
$smarty->assign('usuario',$_SESSION['usuario']);

$smarty->display('paginaWeb.tpl')
?>