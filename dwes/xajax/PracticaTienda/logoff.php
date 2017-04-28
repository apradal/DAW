<?php
if (isset($_POST['desconectar'])){

    session_start();

    session_unset();
    header("Location: login.php");
    exit;

}

?>