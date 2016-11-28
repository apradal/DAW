<?php
header( "refresh:10;url=index.html" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
function duplicar(&$a, $b){
    echo 'El valor de la primera variables es: ' . $a .'<br>';
    echo 'El valor de la segunda variables es: ' . $b .'<br>';
    $a = $a * 2;
    $b = $b * 2;
    echo 'El valor de la primera variables duplicada es: ' . $a .'<br>';
    echo 'El valor de la segunda variables duplicada es: ' . $b .'<br>';
    return ($a > $b) ? $a : $b ;
}

$valor1 = 3;
$valor2 = 6;
echo 'el valor de $valor1 es: ' . $valor1 . '<br>';
echo 'el valor de $valor2 es: ' . $valor2 . '<br>';

duplicar($valor1, $valor2);

echo 'el valor de $valor1 es: ' . $valor1 . '<br>';
echo 'el valor de $valor2 es: ' . $valor2 . '<br>';

/*8.-Plantea que pasará si creamos dentro de la función una variable global
que sea el igual al segundo parámetro de la función
*/?>
</body>
</html>
