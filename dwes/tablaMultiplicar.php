<?php
$numero = floor(rand(1, 100));
$tabla = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <ul>
            <li>Tabla del <?php echo $numero ?></li>
            <?php foreach ($tabla as $fila): ?>
                <li><?php echo $numero ?> por <?php echo $fila ?> = <?php echo $numero * $fila ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>