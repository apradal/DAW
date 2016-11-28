<?php
$typesOfNumbers = array(
    0 => 'Decimal',
    1 => 'Octal',
    2 => 'Hexadecimal');

function checkNumbers($a, $b, $num) {
    switch ($a) {
        case 0: if ($b == 1) {
                echo decoct($num);
            } elseif ($b == 2) {
                echo dechex($num);
            } else {
                echo $num;
            };
            break;
        case 1: if ($b == 0) {
                echo octdec($num);
            } else {
                echo $num;
            };
            break;
        case 2: if ($b == 0) {
                echo hexdec($num);
            } else {
                echo $num;
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <h3>Cambia formatos numericos según le indiques</h3>
<?php if (!isset($_POST['send'])): ?>
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
                <p>Introduce el formato y el numero que quieres cambiar.</p>
                <select name="convert">
                        <?php foreach ($typesOfNumbers as $key => $value): ?>
                        <option value="<?php echo $key ?>">
                        <?php echo $value ?>
                        </option>
    <?php endforeach; ?>
                </select><br>
                <input type="number" name="number">
                <p>Introduce el formato al cual quieres que cambie.</p>
                <select name="converted">
                        <?php foreach ($typesOfNumbers as $key => $value): ?>
                        <option value="<?php echo $key ?>">
                        <?php echo $value ?>
                        </option>
    <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Enviar" name="send">
            </form>
        <?php elseif (isset($_POST['send']) && (empty($_POST['number']))):
            ?>
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
                <p>Introduce el formato y el numero que quieres cambiar.</p>
                <select name="convert">
                        <?php foreach ($typesOfNumbers as $key => $value): ?>
                        <option value="<?php echo $key ?>" <?php echo $key == $_POST["convert"] ? 'selected' : '' ?>>
                        <?php echo $value ?>
                        </option>
    <?php endforeach; ?>
                </select><br>
                <input type="number" name="number"> <span style="color: red;">Error, debe introducir un numero</span>
                <p>Introduce el formato al cual quieres que cambie.</p>
                <select name="converted">
                        <?php foreach ($typesOfNumbers as $key => $value): ?>
                        <option value="<?php echo $key ?>" <?php echo $key == $_POST["converted"] ? 'selected' : '' ?>>
                        <?php echo $value ?>
                        </option>
    <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Enviar" name="send">
            </form>
        <?php else: ?>
            El numero <?php echo $_POST['number'] ?> con formato
            <?php
            switch ($_POST['convert']) {
                case 0 : echo 'Decimal';
                    break;
                case 1 : echo 'Octal';
                    break;
                case 2 : echo 'Hexadecimal';
                    break;
            }
            ?>
            en formato
            <?php
            switch ($_POST['converted']) {
                case 0 : echo 'Decimal';
                    break;
                case 1 : echo 'Octal';
                    break;
                case 2 : echo 'Hexadecimal';
                    break;
            }
            ?>
            es: <br>
            <?php checkNumbers($_POST['convert'], $_POST['converted'], $_POST['number']) ?>
<?php endif; ?>
    </body>
</html>