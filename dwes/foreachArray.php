<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <table border="1">
            <th colspan="2">Array variable $_Server</th>
            <tr><td>Variable</td><td>Valor</td></tr>
        <?php
        /*Haz una página PHP que utilice foreach para mostrar todos los valores
         *  del array $_SERVER en una tabla con dos columnas. La primera columnaç
         *  debe contener el nombre de la variable, y la segunda su valor.*/
        foreach($_SERVER as $codigo => $valor){
            print "<tr><td>".$codigo."</td><td>".$valor."</td></tr>";
        }
        ?>
        </table>
    </body>
</html>
