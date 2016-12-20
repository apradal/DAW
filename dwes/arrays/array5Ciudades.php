<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>Crea un array indexado con 5 valores de ciudades y recórrelo con un for</h3>
<?php
/*Define un array de 5 ciudades y recorrelo con un bucle for usando count()*/
$cities = array('Zaragoza','Madrid','Barcelona','Valencia','Albacete');
for ($i = 0; $i < count($cities); $i++) {
    echo $cities[$i] . "<br/>";
}
?>
</body>
</html>