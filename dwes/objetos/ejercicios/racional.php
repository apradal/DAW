<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Construir una clase llamado racional que podamos inicializar con un string del tipo por ejemplo "8/5"*/
class Racional{

    private $number;

    public function __construct($string){
        $this->number = $string;
    }
//este ejercicio solo muestra lo que devuelve el metodo magico __toString().
    public function __toString()
    {
        return $this->number;
    }

}
$a = new Racional("3/4");
echo "al tener el metodo mágico __toString, vasta con poner el nombre de objeto y llamará el solo a este metodo __toString.<br/>";
echo "\$a = $a";
?>
</body>
</html>