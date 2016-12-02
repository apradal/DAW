<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5" url="arrayImagenes.php"/>
    <title>Title</title>
</head>
<body>
<h1>Muestra 3 imagenes aleatoriamente</h1>
<?php
/*Escribir un programa que:
Inicialice un vector con 10 imágenes (podéis utilizar éste código.php que crea el vector $imagenes)
La página debe mostrar, aleatoriamente, 3 imágenes (puedes usar como alternativa la función shuffle
($imagenes) la cuál desordena el vector), o usar un rand para obtener indices aleatorios.
Cada 5 segundos ha de refrescarse la página para ir mostrando imágenes distintas (podéis usar, por
ejemplo, este trozo de código HTML y añadirlo en el <HEAD> de la página*/
$imagenes = array(
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/a_piece_for_the_wicked_vol_1.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/double_t.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/flagrantly_yours.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/gothic.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/iliad_of_a_wolverhampton_wanderer.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/libertine.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/lullabies_for_tough_guys.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/nocturnal_nomad.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/the_idle_gait_of_the_self_possessed.gif",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/the_life_and_times_of_a_ballad_monger.jpg"
);
for ($i = 0; $i < 3; $i++){
    echo "<img src='" .$imagenes[rand(0,10)]."'></img>";
}
?>
</body>
</html>