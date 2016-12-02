<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Creamos 10 notas aleatorias, y posteriormente las visualizamos
Sacamos la máxima la mínima y la media*/
    $notes = [1,2,3,4,5,6,7,8,9,10];
    $longArray = count($notes);
    $max = $min = $media = false;
    echo "la nota máxima es ";
    for ($i = 0; $i < $longArray; $i++){
        $actual = $notes[$i];
        if ($actual > $viejo){
            $max = $actual;
        }
        $viejo = $notes[$i];
    };
    echo $max + "<br/>";
?>
</body>
</html>