<?php
class Racional extends OperacionRacional {

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

    /**
     * @param Racional $b
     * @return string
     * calcula la suma de dos fracciones
     */
    public function suma (Racional $b) {
        if ($this->getDen() == $b->getDen()){
            $numResultado = $this->getNum() + $b->getNum();
            $denResultado = $this->getDen();
            $resultado = new Racional($numResultado,$denResultado);
            return $resultado->getNum().'/'.$resultado->getDen();
        } else{
            $numResultado = ($this->getNum() * $b->getDen()) + ($b->getNum() * $this->getDen());
            $denResultado = $this->getDen() * $b->getDen();
            $resultado = new Racional($numResultado,$denResultado);
            return $resultado->getNum().'/'.$resultado->getDen();
        }

    }

    /**
     * @param Racional $b
     * @return string
     * Calcula la resta de dos fracciones
     */
    public function resta (Racional $b){
        if ($this->getDen() == $b->getDen()){
            $numResultado = $this->getNum() - $b->getNum();
            $denResultado = $this->getDen();
            $resultado = new Racional($numResultado,$denResultado);
            return $resultado->getNum().'/'.$resultado->getDen();
        } else{
            $numResultado = ($this->getNum() * $b->getDen()) - ($b->getNum() * $this->getDen());
            $denResultado = $this->getDen() * $b->getDen();
            $resultado = new Racional($numResultado,$denResultado);
            return $resultado->getNum().'/'.$resultado->getDen();
        }
    }

    /**
     * @param Racional $b
     * @return string
     * Calcula la multiplicacion de dos fracciones
     */
    public function multiplicar (Racional $b){

        $numResultado = $this->getNum() * $b->getNum();
        $denResultado = $this->getDen() * $b->getDen();
        $resultado = new Racional($numResultado,$denResultado);
        return $resultado->getNum().'/'.$resultado->getDen();

    }

    /**
     * @param Racional $b
     * @return string
     * Calsula la division de dos fracciones
     */
    public function dividir (Racional $b){
        $numResultado = $this->getNum() * $b->getDen();
        $denResultado = $this->getDen() * $b->getNum();
        $resultado = new Racional($numResultado,$denResultado);
        return $resultado->getNum().'/'.$resultado->getDen();

    }

    /**
     * @return mixed
     * Gets y Setters
     */

    public function getNum(){
        return $this->num;
    }

    public function getDen(){
        return $this->den;
    }

}
?>