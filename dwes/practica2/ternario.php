<?php
header( "refresh:2;url=index.html" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Usando el operador ternario pide un número y visualiza si el número es par o impar
Volver al index después de 2 segundos*/
?>
<?php if (!$_POST): ?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <span>
        Introduce número: <input type="number" name="number"><br>
        <input type="submit">
    </span>
</form>
<?php else:
    echo ($_POST['number'] % 2 == 0) ? 'numero par' : 'numero impar' ?>
<?php endif; ?>
</body>
</html>
