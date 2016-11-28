<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <th colspan="2">Array variable $_Server</th>
            <tr><td>Variable</td><td>Valor</td></tr>
        <?php
        /*Haz una p�gina PHP que utilice estas funciones para crear una tabla 
         * como la del ejercicio anterior.*/
       reset($_SERVER);
        while ($server = each($_SERVER)) {
            print "<tr><td>".$server[0]."</td><td>".$server[1]."</td></tr>";
        }
        ?>
        </table>
    </body>
</html>
