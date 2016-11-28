<?php
$a = 5;
$b = "hola";
function cambioValor(&$a, &$b)
{
    echo 'valor variable $a <b>'.$a.'</b> y valor de variable $b <b>' .$b.'</b><br>';
    $a += 5;
    $b = "adios";
    echo 'valor variable $a <b>'.$a.'</b> y valor de variable $b <b>' .$b.'</b>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php cambioValor($a,$b) ?>
</body>
</html>
