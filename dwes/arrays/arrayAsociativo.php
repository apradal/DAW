<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .artistas{
            background-color: black;
            padding: 10px;
            margin: 10px 0;
        }
        .artista{
            color: #60B407;
        }
        .años{
            color: white;
        }
        .canciones{
            background-color: #EEFFEE;
            margin: 50px;
            padding: 30px;
        }
        .cancion{
            color: #60B407;
        }
    </style>
</head>
<body>
<?php
/*Dado un fichero que contiene un array asociativo
El array contiene información de cantantes y de cada cantante su nombre, su década y canciones que tiene
Se trata que trabajes en dos aspectos que se complementas
Entender y explicar el contenido del array, es decir si es asociativo o indexado y los indices que tiene.
 Si una posición es un array a su vez procedemos a explicarlo igualmente
Posteriormente lo recorreremos mostrando información de los cantantes y para cantante sus canciones
Para hacer esta parte facilito un pequeño css y consistiría en aplicar el div cantante y el div canciones
*/
$artistas = array(
    'PEARL JAM' => array(
        'años' => array(1990,2000),
        'canciones' => array('NO WAY','HUMMUS','LEASH','GIVEN TO FLY','NOTHING AS IT SEEMS','SAVE YOU','EVEN FLOW','ANIMAL','REARVIEWMIRROR','SPIN THE BLACK CIRCLE')
    ),
    'BO DIDDLEY' => array(
        'años' => array(1950,1960,1970,1980,1990,2000),
        'canciones' => array('WHO DO YOU LOVE?','ROAD RUNNER',"YOU CAN'T JUDGE A BOOK BY IT'S COVER",'OOH BABY','DIDDLEY DADDY','WHO DO YOU LOVE',"I'M A MAN")
    ),
    'THE CULT' => array(
        'años' => array(1980,1990,2000),
        'canciones' => array('THE WITCH (EDIT)','REVOLUTION (EDIT)','LOVE REMOVAL MACHINE','RAIN','IN THE CLOUDS','COMING DOWN (EDIT)','EDIE (CIAO BABY) [EDIT]','HEART OF SOUL (EDIT)','WILD FLOWER','STAR (EDIT))')
    )
);
foreach ($artistas as $artista => $info){
    echo '<div class="artistas">';
    echo '<span class="artista">' . $artista . '</span>';
    foreach ($info as $datos => $valorDatos){
        if ($datos == 'años') {
            echo '<span class="años"> (';
            foreach ($valorDatos as $valor){
                echo ($valor == end($valorDatos)) ? $valor : $valor . ",";
            }
            echo ')</span>';
        } elseif ($datos == 'canciones') {
            echo '<ol class="canciones">';
            foreach ($valorDatos as $valor){
                echo "<li><span class='cancion'>" . $valor . "</span></li>";
            }
            echo '</ol>';
        }
    }
    echo '</div>';
}
?>
</body>
</html>