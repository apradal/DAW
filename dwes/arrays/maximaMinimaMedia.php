<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>Crea un array con 10 notas aleatorias y posteriormente las visualizas obteniendo los
    valores estadísticos de la media, máxima y mínima</h3>
<?php
for ($i = 0; $i < 10; $i++){
    $notes [] = rand(0,10);
}
echo "máxima: " . max($notes) . "<br/>";
echo "mínima: " . min($notes) . "<br/>";
echo "media: " . array_sum($notes) / count($notes)  . "<br/>";
?>
</body>
</html>