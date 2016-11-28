<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$nombre = 'antonio';
$apellidos = 'prada lara';
echo '"'.$nombre .'" ', "\"$apellidos\"";
print '<br>' . $nombre . ' ' . $apellidos . '<br>';

$informe = <<<FIN
hola me soy un texto
de 5 lineas
aunque no se que poner
esta es la cuarta linea
y esta la ultima.
FIN;

echo $informe . '<br>';

$a = 1;
echo var_dump($a); //saca tipo y valor
echo gettype($a) . '<br>'; //saca tipo solo

$a = true;
printf('valor a boolean %s <br>' , $a);

$a = 1.3;
printf('valor a float %f <br>' , $a);

$a = 'hola que tal';
printf('valor a string %s <br>' , $a);

$a = null;
printf('valor a null %s <br>' , $a);

echo 'time(): ' . time() . '<br>'; //devuelve en segundos el tiempo transcurrido desde la epoca unix (1970)

echo 'date("j-n-Y"):' . date('j-n-Y') . '<br>';

echo 'dias desde 1970:' . round(time() / (60*60*24)) . '<br>';
echo 'meses desde 1970:' . round(time() / (60*60*24*30)) . '<br>';
echo 'años desde 1970:' . round(time() / (60*60*24*30*12)) . '<br>';

echo 'date("l-j-F-Y"):' . date('l\,\ \d\i\a j \d\e\ \ F \d\e\ \ Y') . '<br>';

$cumple = new DateTime("1986-06-25"); //formato estandar de php Y-M-D
$cumple2 = "25-06-1986"; //en string
$year = $cumple->format("Y"); //forma de formatear la fecha dada
$year2 = substr($cumple2,6); //forma substring para sacar el año de una string
echo 'DateTime format en años desde mi nacimiento:' . (2016-$year) . '<br>';
echo 'Meses desde mi nacimiento:' . $year2 * 12 . '<br>';
echo 'dias desde mi nacimiento:' . $year2 * 365 . '<br>';

$fecha = new DateTime();
$fecha -> setDate(1969, 10, 30);
$año = $fecha -> format("Y");
echo 'años:' . (date("Y") - $año) . '<br>';
echo 'meses:' . (date("Y") - $año) * 12 . '<br>';
echo 'dias:' . (date("Y") - $año) * 365 . '<br>';

$hoy = getdate();
print_r($hoy);


//Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de http://php.net/manual/es/function.strtotime.php
echo "<hr>";
echo strtotime("now"), "<br/>"; //devuelve en segundos el tiempo pasado desde 1970 hasta ahora
echo date('d-m-Y', strtotime("now")), "<br/>"; //con formato dia,mes, del timestamp ahora.
echo strtotime("27 September 1970"), "<br/>"; //segundos desde 1970 hasta 27 septiembre 1970
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>"; //devuelve con fecha dia,mes,año la fecha data por timestamps
echo strtotime("+1 day"), "<br/>";
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
echo strtotime("+1 week"), "<br/>";
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
echo strtotime("next Thursday"), "<br/>";
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo strtotime("last Monday"), "<br/>";
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "<hr>"

?>
</body>
</html>