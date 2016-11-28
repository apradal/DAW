<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Cada vez que se inserte un nombre en el campo de texto y se haga click en el submit,
 se contabilizará como que el usuario cuyo nombre hemos insertado se ha conectado una vez.
Si el campo de texto está vacío no se contabilizará un usuario llamado "vacío".
Futuras conexiones del mismo usuario incrementarán el número de accesos de ese usuario
Futuras conexiones de otro usuario contabilizarán las conexiones del nuevo formulario
En todo momento la aplicación nos mostrará un listado con todas las conexiones de cada usuario.*/
?>
<?php
if ($_POST['send']){
    //sanitizo la entrada y lo meto en una variable
    $tmpName = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
    //meto en un array todos los input con name nombres
    $nombres = ($_POST['nombres']) ? $_POST['nombres'] : [];
    //compruebo si el nombre está vacio o si no meto el nombre (si ya existe no lo machqaca la key)
    $nombre = (empty($tmpName)) ? 'vacio' : $tmpName;
    //la key del nombre metido aumenta en 1 su value.
    $nombres [$nombre] ++;
}
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="name">Nombre: </label><input type="text" name="name"/>
    <input type="submit" name="send" value="Enviar"/>
    <?php
        //recorro el array para imprimir todos los nombres y sus valores en hidden
        //necesito imprimir todos para luego recuperarlos en un array.
        foreach ($nombres as $key => $value){
            echo '<br/><input type="hidden" name="nombres['.$key.']" value="'.$value.'" />';
            echo $key . $value;
        }
    ?>
</form>
</body>
</html>