<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
function calcularPrimo($num){
    $primo = true;
    $valor = 2;
    while ($primo == true && $valor < $num){
        $primo = ($num % $valor == 0) ? false : true;
        $valor++;
    }
    return $primo;
}
?>
<?php if (!$_POST) : ?>
<form action=<?php echo $_SERVER['PHP_SELF'] ?> method="post">
    <input type="number" name="number">
    <input type="submit" value="Enviar" name="send">
</form>
<?php else: $resultado = calcularPrimo($_POST['number']) ?>
    <?php if ($resultado): echo 'Es primo'; else: echo'No es primo'; endif; ?>
<?php endif ?>
</body>
</html>