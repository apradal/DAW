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
        <?php
        print "<p>Llamo a variable externa sin hacer include (no se puede)<br/></p>";
        print "<p>Variable: ".$variableExterna." </p>";
        include "externo.inc.php";
        print "<p>Llamo a variable externa incluyendo archivo<br/></p>";
        print "<p>Variable: ".$variableExterna." </p>";
        ?>
    </body>
</html>
