<?php
require_once ('BD.php');
require_once('Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = '/var/web/smarty/tienda/templates/';
$smarty->compile_dir = '/var/web/smarty/tienda/templates_c/';
$smarty->config_dir = '/var/web/smarty/tienda/configs/';
$smarty->cache_dir = '/var/web/smarty/tienda/cache/';

if (isset($_POST['enviar'])){
    //recojo los datos
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    //si estan vacios saco el error
    if (($user == null || empty($user)) || (($pass == null || empty($pass)))){
        $smarty->assign('error','Debes introducir un nombre de usuario y una contraseña');
    } else {
        //saneo los datos
        $user = filter_var($user, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        //si una vez saneados no estan en blanco continuamos.
        if ($pass == "" || $user == ""){
            $smarty->assign('error','Introduzca caracteres válidos en los campos.');
        }else{
            if (BD::verificarCliente($user,$pass)){
                session_start();
                $_SESSION['usuario']=$user;
                header("Location: productos.php");
            }else{
                // Si las credenciales no son válidas, se vuelven a pedir
                $smarty->assign('error','Usuario o contraseña no válidos!');
            }
        }
    }
}

$smarty->display('login.tpl');
?>