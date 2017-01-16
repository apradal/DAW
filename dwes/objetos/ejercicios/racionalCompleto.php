<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/*Siguiendo el ejemplo establecido anteriormente realiza un constructor que permita instanciar un objeto
de la clase racional de la siguiente manera

$a = new racional ("8/5");/*  8/5
$b = new racional (5,4);  /*   5/6
$c = new racional (5);    /*   5/1
$d = new racional ();     /*   1/1
*/
class Racional{

    private $num,$den;

    public function __construct($num,$den){

        if (is_null($den)){
            switch (is_numeric($num)) {
                case true:
                    $this->num = $num;
                    $this->den = 1;
                    break;
                case false:
                    if (is_null($num)){
                        $this->num = 1;
                        $this->den = 1;
                        break;
                    }
                    else {
                        $datos = explode("/", $num);
                        $this->num = $datos[0];
                        $this->den = $datos[1];
                        break;
                    }
            }
        } else {
            $this->num = $num;
            $this->den = $den;
        }

    }

    public function __toString()
    {
        return ($this->num."/".$this->den);
    }

}
$a = new Racional("8/5");
$b = new Racional(5,4);
$c = new Racional(5);
$d = new Racional();

echo "El racional \$a como string da: $a <br/>";
echo "El racional \$b como dos números da: $b <br/>";
echo "El racional \$c como un solo número da: $c <br/>";
echo "El racional \$d como vacio da: $d <br/>";
?>
</body>
</html>