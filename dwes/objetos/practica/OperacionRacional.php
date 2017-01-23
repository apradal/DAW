<?php

/**
 * Class OperacionRacional
 * Realiza una operación racional
 */
class OperacionRacional extends Operacion {

    public function __construct($operacion) {

        parent::__construct($operacion);

    }

    /**
     * @param $fraccion
     * @return string
     * Simplifica la fraccion pasada por parametro, utilizando el mcd
     */

    public function simplifica($fraccion){

        $operandos = preg_split('/\//',$fraccion);
        $op1 = $operandos[0];
        $op2 = $operandos[1];
        if ($op1 < $op2){
            $op3 = $op1;
            $op1 = $op2;
            $op2 = $op3;
            do{

                $rest = $op1%$op2;
                if ($rest == 0){
                    $mcd = $op2;
                }
                $op1 = $op2;
                $op2 = $rest;

            }while($rest != 0);
        } else {
            do{

                $rest = $op1%$op2;
                if ($rest == 0){
                    $mcd = $op2;
                }
                $op1 = $op2;
                $op2 = $rest;

            }while($rest != 0);
        }

        return $operandos[0]/$mcd . "/" . $operandos[1]/$mcd;

    }

    /**
     * @param OperacionRacional $objeto
     * @return string
     * Separa los operandos para crear con ellos 2 objetos fraccion racional
     * Y se encarga de llamar a la funcion necesaria para sumar,restar,etc.
     */
    public function operacionRacional(OperacionRacional $objeto){

        $op1 = preg_split('/\//',$objeto->getOperando1());
        $op2 = preg_split('/\//',$objeto->getOperando2());

        $racional1 = new Racional($op1[0],$op1[1]);
        $racional2 = new Racional($op2[0],$op2[1]);

        switch ($objeto->getOperador()){
            case ($objeto->getOperador() == '+'):
                $resultado = $racional1->suma($racional2);
                return $resultado;
                break;
            case ($objeto->getOperador() == '-'):
                $resultado = $racional1->resta($racional2);
                return $resultado;
                break;
            case ($objeto->getOperador() == '*'):
                $resultado = $racional1->multiplicar($racional2);
                return $resultado;
                break;
            case ($objeto->getOperador() == ':'):
                $resultado = $racional1->dividir($racional2);
                return $resultado;
                break;
        }

    }


}
?>