<?php
$numero = floor(rand(1,100));
$tabla = array(0,1,2,3,4,5,6,7,8,9,10);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<ul>
<?php
    echo '<li>Tabla del '.$numero;
    foreach ($tabla as $fila){
        echo '<li>'.$numero.' por '.$fila.' = '.$numero*$fila.'</li>';
    }
?>
</ul>
</body>
</html>