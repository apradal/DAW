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
$a = 125;
print '$a vale 125 int: '.$a.'<br>';
$a = 874;
print '$a vale 0874 octal: '.$a.'<br>';
$a = 0xAbC12;
print '$a vale 0xAbC12 hex: '.$a.'<br>';
$a = 0b1100;
print '$a vale 0b1100 hex: '.$a.'<br>';
$a = "Esto es una cadena de caracteres";
print '$a vale "Esto es una cadena de caracteres" string: '.$a.'<br>';
$a = 'Esto es otra cadena de caracteres';
print '$a vale \'Esto es otra cadena de caracteres\' string: '.$a.'<br>';
$a = <<<MULTI
Esto es una cadena
multilínea
y termina aquí
MULTI;
print '$a vale multi string: '.$a.'<br>';
$a = 1.23432230003322014000002234101;
print '$a vale 1.23432230003322014000002234101 float: '.$a.'<br>';
$a = 1234E-2;
print '$a vale 1234E-2 exponencial: '.$a.'<br>';
$a = null;
print '$a vale null y es : '.$a.'<br>';
$a = true;
print '$a vale true es boolean: '.$a.'<br>';
$a = false;
print '$a vale false es boolean: '.$a.'<br>';
?>
</body>
</html>
