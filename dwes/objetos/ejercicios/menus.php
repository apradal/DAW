<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Confeccionar una clase Menu. Permitir añadir la cantidad
 de opciones que necesitemos. Mostrar el menú en forma
 horizontal o vertical (según que método llamemos)*/
class Menu{

    private $enlace = array();
    private $titulo = array();

    public function __construct($enlace, $titulo){

        $this->enlace[] = $enlace;
        $this->titulo[] = $titulo;

    }

    public function addOption($enlace, $titulo){

        $this->enlace[] = $enlace;
        $this->titulo[] = $titulo;

    }

    public function imprimirH(){
        for ($i = 0; $i < count($this->enlace); $i++){
            echo "<a href='" . $this->enlace[$i] . "'>".$this->titulo[$i] ."</a>  ";
        }

    }

    public function imprimirV(){
        $counter = 0;
        foreach ($this->enlace as $item => $value) {
            echo "<a href='.$value.'>".$this->titulo[$counter]."</a><br/>";
            $counter++;
        }
    }

}
?>
<h1>Menu</h1>
<?php
$menu = new Menu("www.as.com", "As");
$menu->addOption("www.google.com", "Google");
$menu->addOption("www.facebook.com", "Facebook");
$menu->imprimirH();
echo "<br/>";
$menu->imprimirV();
?>
</body>
</html>