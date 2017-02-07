<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<?php
try {

    if (isset($_POST['dividir'])){

        $dividendo = $_POST['dividendo'];
        $divisor = $_POST['divisor'];

        if ($divisor == 0){
            throw new Exception("División por cero.");
        } else {
            $resultado = $dividendo / $divisor;
            echo "$resultado <br/>";
        }

    }

}
catch (Exception $e) {
    echo "Se ha producido el siguiente error: ".$e->getMessage();
}
?>
    <input type="number" name="dividendo"/>
    <input type="number" name="divisor"/>
    <input type="submit" value="Dividir" name="dividir"/>
</form>
</body>
</html>