<?php
/**
 * @param $hours
 * @param $price
 */
function calcularBruto($hours,$price){
    if ($hours>40) {
        $extras = $hours - 40;
        $hours -= $extras;
        $totalBase = ($hours * $price)*4;
        $totalExtras = ($extras * ($price * 1.5))*4;
        return $totalBase+$totalExtras;
    }else {
        return $hours*$price*4;
    }
}
function calcularNeto($salarioBruto,$irpf){
    return $salarioBruto - $irpf;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!-- haz un programa que a partir de precio hora y de número de horas calcule una nómina, teniendo en cuenta que:
mas de 40 horas son extras (1.5 el precio base)
IRPF < 600E exento
Entre 600 y 800 5%
Mas de 800 12 %
Nos debe de dar detalle del bruto, descuentos y neto de salario-->
<?php if (!$_POST) : ?>
<h3>Calcula tu nómina</h3>
<form action=<?php echo $_SERVER['PHP_SELF'] ?> method="post">
Numero de horas trabajadas: <input type="number" name="numberHours"><br><br>
Precio de las horas: <input type="number" name="priceHours"><br><br>
<input type="submit" value="Enviar" name="send">
<?php else : ?>
El salario bruto es: <?php $bruto =  calcularBruto($_POST['numberHours'],$_POST['priceHours']); echo $bruto?><br><br>
    <?php if ($bruto > 600 && $bruto < 800): ?>
        <?php $descuento = $bruto*0.05; echo 'El IRPF 5% es: ' . $descuento ?><br><br>
        El salario neto es: <?php echo calcularNeto($bruto,$descuento) ?>
    <?php elseif($bruto>800): ?>
        <?php $descuento = $bruto*0.12; echo 'El IRPF 12% es: ' . $descuento ?><br><br>
        El salario neto es: <?php echo calcularNeto($bruto,$descuento) ?>
    <?php else: ?>
        El salario neto es: <?php echo calcularNeto($bruto,0) ?>
    <?php endif; ?>
<?php endif; ?>
</form>
</body>
</html>