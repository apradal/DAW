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
        echo "hola mundo con echo";
        print "<p> hola mundo con print </p>";
        $world = "mundo";
        printf("<p> hola %s con printf y variable world",$world);
        print "<p>La variable mundo con corchetes: ${world}</p>";
        print "<p>La variable mundo: $world</p>";
        print "<p>concateno mundo con la variable " . $world . "</p>";
        ?>
    </body>
</html>
