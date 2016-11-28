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
            $dia = array(0 => "Lunes", 1 => "Martes", 2 => "Miercoles", 3 => "Jueves", 4 => "Viernes", 5 => "Sabado", 6 => "Domingo");
            $mes = array(0 => "Enero", 1 => "Febreo", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio",7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");
            if (isset($_POST["semana"]) && !empty($_POST["dia"]) && isset($_POST["mes"])
                && ($_POST["dia"] > 0 && $_POST["dia"] <= 31)) {
            ?>
            <?php echo "Hoy es: " . $dia[$_POST["semana"]] . " d&iacutea " . $_POST["dia"] . " de " . $mes[$_POST["mes"]] ?>
        <?php } else { ?>
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
                Introduzca d&iacute;a de la semana:
                <select name="semana">
                    <?php foreach ($dia as $key => $value ){
                        if ($key == $_POST["semana"]){
                            echo "<option value=".$key." selected>".$value."</option>";
                        } else {
                            echo "<option value=".$key.">".$value."</option>";
                        }
                    }?>
                </select><br>
                Introduzca d&iacute;a del mes (num&eacute;rico): <input type="text" name="dia"><span style="color: red">Error en el d&iacute;a</span><br>
                Introduzca mes: 
                <select name="mes">
                    <?php foreach ($mes as $key => $value ){
                        if ($key == $_POST["mes"]){
                            echo "<option value=".$key." selected>".$value."</option>";
                        } else {
                            echo "<option value=".$key.">".$value."</option>";
                        }
                    }?>
                </select><br>
                <input type="submit" value="Enviar" name="enviar">
            </form>
        <?php } ?>
    </body>
</html>
