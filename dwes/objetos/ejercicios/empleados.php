<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
Definir un método inicializarlo para que lleguen como dato el nombre y sueldo.
Plantear un segundo método que imprima el nombre
y un mensaje si debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos)*/
class Empleados{

    private $nombre, $sueldo;

    public function Empleados($nombre, $sueldo){

        $this->nombre = $nombre;
        $this->sueldo = $sueldo;

    }

    public function imprimir(){

        echo "El nombre del empleado es: " . $this->nombre . "<br/>";
        echo ($this->sueldo > 3000) ? "Debe pagar impuestos <br/>" : "No debe pagar impuestos <br/>";

    }
}
?>
<h1>Empleados</h1>
<?php
$empleado1 = new Empleados("antonio", 2500);
$empleado2 = new Empleados("Maria", 3500);
$empleado1->imprimir();
$empleado2->imprimir()
?>
</body>
</html>