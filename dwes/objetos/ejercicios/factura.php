<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Creamos la clase factura
Constantes IVA
Atributos Importe Base, fecha, impuestos, Importe bruto, estado (pagada o pendiente)
Métodos: imprime*/
class Factura{

    const IVA = 0.21;
    private $importeBase, $fecha, $impuestos, $importeBruto, $estado;

    public function __construct($importeBase, $fecha, $impuestos, $importeBruto, $estado){
        $this->importeBase = $importeBase;
        $this->importeBruto = $importeBruto;
        $this->fecha = $fecha;
        $this->impuestos = $impuestos;
        if (strtolower($estado) == "pagada") {
            $this->estado = $estado;
        } else {
            $this->estado = "pendiente";
        }

    }

    public function imprime(){

        echo "Importe base: " . $this->importeBase . "<br/>";
        echo "Fecha: " . $this->fecha . "<br/>";
        echo "Impuestos: " . $this->impuestos . "<br/>";
        echo "Importe bruto: " . $this->importeBruto . "<br/>";
        echo "Iva: " . self::IVA . "<br/>";
        echo "Estado: " . $this->estado. "<br/>";

    }

}

$a = new Factura(100,"25/07/2016",30,130,"pagada");
$a->imprime();
?>
</body>
</html>