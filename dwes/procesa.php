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
        <!-- Crea un formulario HTML para introducir el nombre del alumno y el ciclo que 
         * cursa, a escoger entre ?Desarrollo Web en Entorno Servidor? y ?Desarrollo Web
         *  en Entorno Cliente?. Envía el resultado a la página ?procesa.php?, que será
         *  la encargada de procesar los datos. -->
        <?php
        if (isset($_POST["enviar"])) {
            echo "Alumno apuntado: " . $_POST["nombre"] ."<br>";
            $curso = $_POST["ciclo"];
            if ($curso === "dwes") {
                echo "Curso seleccionado es Desarrollo Web en Entorno Servidor <br>";
            } else {
                echo "Curso seleccionado es Desarrollo Web en Entorno Cliente <br>";
            }
        } else {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Nombre: <input type="text" name="nombre"><br>
            Ciclo: <select name="ciclo">
                <option value="dwes">Desarrollo Web en Entorno Servidor</option>
                <option value="dwec">Desarrollo Web en Entorno Cliente</option>
            </select><br>
            <input type="submit" value="enviar" name="enviar">
        </form>
        <?php
        }
        ?>
    </body>
</html>
