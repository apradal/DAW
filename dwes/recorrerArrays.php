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
        <p>Reccorer array con <b>next</b></p>
        <?php
        $nombres = array("antonio", "maria", "carlos", "victor", "felix", "rosa", "gabi");
        while ($nombre = next($nombres)) {
            print "<p>" . $nombre . "</p>";
        }
        ?>
        <p>Reccorer array con <b>prev</b></p>
        <?php
        end($nombres);
        while ($nombre = prev($nombres)) {
            print "<p>" . $nombre . "</p>";
        }
        ?>
        <p>Reccorer array con <b>each</b></p>
        <?php
        reset($nombres);
        while ($nombre = each($nombres)) {
            print "<p>" . $nombre[1] . "</p>";
        }
        ?>
    </body>
</html>
