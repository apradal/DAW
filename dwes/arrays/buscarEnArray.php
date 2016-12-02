<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*implementar una función que busca si un determinado valor aparece en una matriz.
La función recibe 2 parámetros: la matriz y el elemento a buscar, y devuelve si ha
 encontrado el valor (TRUE) o no (FALSE).
Implementar la función, con los parámetros (el array, y el valor a buscar).
Para probar la función implementada, generar un array de 100 posiciones de valores enteros
entre 1 y 100. #Generar, también, el número que hay que buscar en el array.
Llamar a la función con el array y el valor como parámetros de la función.
Mostrar los resultados por pantalla.*/
//CREACION DEL ARRAY CON 100 NUMEROS ALEATORIOS
$numbers = array();
for ($i = 0; $i < 101; $i++){
    $numbers[] = rand(0,100);
}
/**
 * @param $array
 * @param $number
 * @return bool
 * RECORRE EL ARRAY EN BUSCA DEL NUMERO
 */
function comprobarNumero($array, $number){
    foreach ($array as $valor) {
        if ($valor == $number){
            return true;
        }
    }
}
//EJECUCION DEL PROGRAMA
$num = rand(0,100);
echo (comprobarNumero($numbers,$num)) ? "El número " . $num . " está en el array" : "el número " . $num . " no está";
?>
</body>
</html>