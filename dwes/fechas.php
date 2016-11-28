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
        //sete la zona horaria de la zona que quieras
        date_default_timezone_set('Europe/Paris');
        // Imprime algo como: Monday
        print "<p>Imprime el d&iacutea en letra: <br/>".date("l")."</p>";

        // Imprime algo como: Monday 8th of August 2005 03:12:46 PM
        print "<p>Imprime dia en letra y en numero, mes en letra año y fecha en hora minutos segundon: <br/>".date('l jS \of F Y h:i:s A')."</p>";

        
        ?>
    </body>
</html>
