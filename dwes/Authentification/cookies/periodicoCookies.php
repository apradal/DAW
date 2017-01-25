<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Crea una pagina que simule ser la de un periódico. La misma debe permitir configurar
que tipo de titular deseamos que aparezca al visitarla, pudiendo ser:
Noticia política.
Noticia económica.
Noticia deportiva.
Mediante tres objetos de tipo radio, permitir seleccionar que titular debe mostrar el periódico.
Almacenar en una cookie el tipo de titutar que desea ver el cliente.
La primera vez que visita el sitio deben aparecer los tres titulares.*/

if (!isset($_COOKIE['titular'])){
    setcookie("titular",$_POST['titular'],time()+360);
} else {
    $titular = $_COOKIE['titular'];
    setcookie('titular',$_POST['titular'], time()+360);
}
?>
<h1>Periodico</h1>
<p>Selecciona que tipo de titular deseas que aparezca en las siguientes visitas.</p>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <fieldset>
        <input type="radio" name="titular" value="politica"/>Política<br/>
        <input type="radio" name="titular" value="economica"/>Económica<br/>
        <input type="radio" name="titular" value="deportiva"/>Deportiva<br/>
        <input type="submit" name="seleccionar"/>
    </fieldset>
</form>
<?php if (!isset($_POST['seleccionar']) or $titular == 'politica') : ?>
    <p>holi politica</p>
<?php endif; ?>
<?php if (!isset($_POST['seleccionar']) or $titular == 'economica') : ?>
    <p>holi economica</p>
<?php endif; ?>
<?php if (!isset($_POST['seleccionar']) or $titular  == 'deportiva') : ?>
    <p>holi deportes</p>
<?php endif; ?>
</body>
</html>