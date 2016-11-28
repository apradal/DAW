<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>Haz un programa que obtenga de forma aleatoria dia (1-31)mes(1-12) y año(1-3000) y nos diga si la fecha es correcta o no y porqué</h3>
<?php $day = rand(1,31); $month = rand(1,12); $year = rand(1,3000);
    $result = checkdate($month,$day,$year) ? 'fecha valida' : 'fecha no valida';
?>
<span>
    La fecha aleatoria creada es <?php echo $day ?> del <?php echo $month ?> de <?php echo $year ?><br>
    Y es una <?php echo $result ?>
</span>
</body>
</html>