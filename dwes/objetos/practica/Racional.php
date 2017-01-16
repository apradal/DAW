<?php
class Racional{

    private $num , $den;

    /**
     * Racional constructor.
     * @param $num
     * @param $den
     * Si el denominador esta vacio, dependiendo del valor de num dara un valor u otro.
     */
    public function __construct($num, $den){

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

    public function suma(Racional $b){

    }

}
?>