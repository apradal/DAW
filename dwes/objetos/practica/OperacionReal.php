<?php

/**
 * Class OperacionReal
 * Realiza una operación real
 */
class OperacionReal extends Operacion {

    /**
     * OperacionReal constructor.
     * @param $operacion
     * Constructor hererado de la clase padre Operacion
     */
    public function __construct($operacion) {

        parent::__construct($operacion);

    }

    public function operacionReal($op1,$op2,$operador){
        $op1 = (int)$op1;
        $op2 = (int)$op2;
        switch ($operador){
            case ($operador == '+'):
                return $op1+$op2;
                break;
            case ($operador == '-'):
                return $op1-$op2;
                break;
            case ($operador == '*'):
                return $op1*$op2;
                break;
            case ($operador == '/'):
                return $op1/$op2;
                break;
        }

    }

}
?>