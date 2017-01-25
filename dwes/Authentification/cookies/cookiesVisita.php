<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*En una página llamada registro.php , almacena en una cookie el último instante
en la que se visitó la página.
Si es su primera visita, muestra un mensaje de bienvenida.
En caso contrario, muestra la fecha y hora de su anterior visita.
Deberás utilizar la función setcookie para guardar el instante de su anterior visita
 y mostrar su contenido utilizando el array $_COOKIE.*/
if (!isset($_COOKIE['visita'])){
    echo "Bienvenido!!! Es tu primera visita";
    setcookie("visita",date('Y-m-d H:i:s'),time()+360);
} else {
    $ultimo = $_COOKIE['visita'];
    echo $ultimo . "<br/>";
    setcookie("visita",date('Y-m-d H:i:s'),time()+360);
}
//setcookie("visita","",time()-360);
?>
</body>
</html>