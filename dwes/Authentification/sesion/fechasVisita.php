<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
session_start();
/*Modifica el programa anterior para almacenar el momento en el cual se produjo cada visita*/
if (count($_SESSION['arrayFechas']) == 0) {
    $_SESSION['arrayFechas'] = [date('Y-m-d H:i:s')];
} else {
    array_push($_SESSION['arrayFechas'],date('Y-m-d H:i:s'));
}
foreach ($_SESSION['arrayFechas'] as $value){
    echo "La última vez que se logueó fue: " . $value . "<br/>";
}
//session_destroy();
?>
</body>
</html>