<?php

/**
 * Class Operacion
 * Esta clase descompondrá la operación y generará un resultado
 */
abstract class Operacion{

    protected $operando1, $operando2, $operacion, $operador, $tipo, $resultado;
    //variables donde se almacenaran los datos cuando se quiera crear objeto de esta clase
    private $op1,$op2,$operator,$type;


    /**
     * Operacion constructor.
     * @param $operacion
     */

    public function __construct($operacion){

        $this->operacion = $operacion;
        $this->conseguirDatos($operacion);
        $this->operando1 = $this->op1;
        $this->operando2 = $this->op2;
        $this->operador = $this->operator;
        $this->comprobarRealRacional($this->operando1,$this->operando2);
        $this->tipo = $this->type;

    }

    /**
     * @param $operacion
     * @return bool
     * Divide la operación para conseguir los datos que permiten crear el objeto
     */

    private function conseguirDatos($operacion){
            //preg_split devuelve en un array los valores cortados por los limitadores. -1 devuelve sin limite length y
            //flag preg_split_delim_capture captura tb los delimitadores del patron. (: + - *)
            $arrayvalor = preg_split('/([\:|\+|\-|\*])/',$operacion, -1, PREG_SPLIT_DELIM_CAPTURE);
            //Una vez partida comprobamos si ha devuelto 1 solo string que significaria que tiene el operador "/"
            if (count($arrayvalor) == 1){
                //comprobamos si tiene mas de "/", si es 1 se dividen si hay más está mal introducido
                if (substr_count($arrayvalor[0],'/') > 1 ){
                    return false;
                } else {
                    $arrayvalor = preg_split('/([\/])/',$arrayvalor[0],-1, PREG_SPLIT_DELIM_CAPTURE);
                    $this->op1 = $arrayvalor[0];
                    $this->operator = $arrayvalor[1];
                    $this->op2 = $arrayvalor[2];
                }
            } else {
                $this->op1 = $arrayvalor[0];
                $this->operator = $arrayvalor[1];
                $this->op2 = $arrayvalor[2];
            }

    }

    /**
     * @param $op1
     * @param $op2
     * Comprueba el tipo de operacion.
     */

    private function comprobarRealRacional($op1, $op2){

        if (strpos($op1,'/') || strpos($op2,'/')){
            $this->type = "racional";
        } else {
            $this->type = "real";
        }

    }

    /**
     * @param $operacion
     * @return bool
     * Comprueba la string introducida que pase los filtros.
     */

    public static function comprobarString($operacion){

        if (self::checkPattern($operacion)){
            if (self::checkOperation($operacion)){
                return true;
            }
        } else {
            return false;
        }

    }

    /**
     * @param $operacion
     * @return int
     * Comprueba que lo introducido solo contiene real o racional, operador, real o racional.
     * Y devuelve 0 o 1.
     */
    private function checkPattern($operacion){

        //pattern que solo permite introducir numeros y operadores.
        $regPattern = '/(^[0-9]+)([\.|\/][0-9]+)?([\+|\-|\*|\:|\/])([0-9]+)([\.|\/][0-9]+)?$/';
        $comprobar = preg_match($regPattern,$operacion);
        return $comprobar;

    }

    /**
     * @param $comprobar
     * @param $operacion
     * @return bool
     * divide el string en operandos y comprueba si son racional o real
     * y llama a la funcion validateOperation.
     */

    private function checkOperation($operacion){

        $arrayvalor = preg_split('/([\:|\+|\-|\*])/',$operacion, -1, PREG_SPLIT_DELIM_CAPTURE);
        //Una vez partida comprobamos si ha devuelto 1 solo string que significaria que tiene el operador "/"
        if (count($arrayvalor) == 1){
            //comprobamos si tiene mas de "/", si es 1 se dividen si hay más está mal introducido
            if (substr_count($arrayvalor[0],'/') > 1 ){
                return false;
            } else {
                $arrayvalor = preg_split('/[\/]/',$arrayvalor[0]);
                return self::validateOperation($arrayvalor);
            }
        } else {
            return self::validateOperation($arrayvalor);
        }

    }

    /**
     * @param $arrayvalor
     * @return bool
     * Compara los dos operandos para saber si la operación es posible o no.
     */

    private static function validateOperation($arrayvalor){

        if (strpos($arrayvalor[0], '/') && strpos($arrayvalor[2], '.')){
            return false;
        } else if (strpos($arrayvalor[0], '.') && strpos($arrayvalor[2], '/')){
            return false;
        }else{
            return true;
        }

    }

    /**
     * @param $valor
     * @return string
     * Metodo guarro para sacar si es real o racional desde la string dada, sin instanciar nada.
     */

    public static function cogerTipo($valor){

        $arrayTemp = preg_split('/[\-|\+|\*|\:]/',$valor);
        if (count($arrayTemp) != 1){
            return (strpos($arrayTemp[0],'/') or strpos($arrayTemp[1],'/')) ? "racional" : "real";
        } else {
            $arrayTemp = preg_split('/[\/]/',$valor);
            return (strpos($arrayTemp[0],'/') or strpos($arrayTemp[1],'/')) ? "racional" : "real";
        }

    }

    public function imprimir($resultado){

        echo '<table border="1">';
        echo '<thead>';
        echo '<th>Concepto</th><th>Valores</th>';
        echo '</thead><tbody>';
        echo '<tr><td>Operando1</td><td>'.$this->getOperando1().'</td></tr>';
        echo '<tr><td>Operando2</td><td>'.$this->getOperando2().'</td></tr>';
        echo '<tr><td>Operador</td><td>'.$this->getOperador().'</td></tr>';
        echo '<tr><td>Tipo de operacion</td><td>'.$this->getTipo().'</td></tr>';
        echo '<tr><td>Resultado</td><td>'.$resultado.'</td></tr>';
        echo '</tbody>';
        echo '</table>';

    }

    /**
     * GETs y toString
     */

    public function getOperando1(){
        return $this->operando1;
    }

    public function getOperando2(){
        return $this->operando2;
    }

    public function getOperador(){
        return $this->operador;
    }

    public function getOperacion(){
        return $this->operacion;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getResultado(){

        return $this->resultado;
    }

    public function setResultado($final){

        $this->resultado = $this->getOperacion()."=".$final;

    }

    public function __toString() {
        return "$this->operando1$this->operador$this->operando2";
    }
}
?>