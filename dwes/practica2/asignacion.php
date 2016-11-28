<?php
header( "refresh:5;url=index.html" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
define("VALOR", "Valor constante");
$a = VALOR;
$b = 4+5;
$c = 'hola';
$d = print 'print es una funcion';
$e = $f = 0;
echo '$a: ' . var_dump($a) . '<br>';
echo '$b: ' . var_dump($b) . '<br>';
echo '$c: ' . var_dump($c) . '<br>';
echo '$d: ' . var_dump($d) . '<br>';
echo '$e: ' . var_dump($e) . '<br>';
?>
</body>
</html>
