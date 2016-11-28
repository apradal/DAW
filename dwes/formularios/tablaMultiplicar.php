<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (!$_POST) : ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    Introduzca un número <input type="text" name="number">
    <input type="submit" value="Enviar">
</form>
<?php elseif (isset($_POST['number']) && is_numeric($_POST['number']) && !(is_null($_POST['number']))) :
    for ($a = 0; $a < 11; $a++) : echo $_POST['number'] . ' x ' . $a . ' = ' . ($_POST['number'] * $a) . '<br>'; endfor; ?>
<?php else : echo 'estas en el else' ?>
<?php endif; ?>
</body>
</html>