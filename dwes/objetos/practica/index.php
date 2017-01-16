<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        header h1{
            text-align: center;
        }
        #left{
            max-width: 500px;
            width: 100%;
            float: left;
            padding-left: 20px;
        }
        #right{
            max-width: 500px;
            width: 100%;
            float: left;
            padding-left: 20px;
        }
        fieldset{
            background-color: #EEEEEE;
            border: 2px solid black;
        }
        legend{
            color: green;
        }
        .display form label{
            display: inline-block;
            margin-right: 20px;
        }
        .display input{
            padding: 10px;
            margin: 0 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Calculadora Real</h1>
    </header>
    <main>
        <div id="left">
            <fieldset>
                <legend><h1>Reglas de uso de la calculadora</h1></legend>
                <p>La calculadora se usa escribiendo la operación.
                La operación será <strong>Operando_1 operación Operando_2.</strong>
                Cada operando puede ser número <strong>real o racional.</strong>
                Real p.e. <strong>5</strong> o <strong>5.12</strong> Racional p.e <strong>6/3</strong> o <stron>7/1</stron>
                Los operadores reales permitidos son <span style="color : red">+ - * /</span>
                Los operadores racionales permitidos son <span style="color : red">+ - * :</span>
                No se deben de dejar espacios en blanco entre operandos y operación
                Si un operando es real y el otro racional se considerará operación racional
                Ejemplo (Real)<strong>5.1+4</strong> (Racional)<strong>5/1:2</strong> (Error)<strong>5.2+5/1</strong> (Error)<strong>52214+</strong></p>
            </fieldset>
        </div>
        <div id="right">
                <fieldset class="display">
                    <legend><h1>Establece la operación</h1></legend>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <label for="operacion"><h2>Operación</h2></label>
                        <input type="text" id="operacion"/>
                        <input type="submit" value="Calcular" id="calcular"/>
                    </form>
                </fieldset>
        </div>
    </main>
</body>
</html>