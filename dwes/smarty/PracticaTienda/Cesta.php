<?php
require_once('BD.php');
require_once('Producto.php');

class Cesta
{
    //atributos de la clase
    protected $productos = [];
    protected $unidades = [];

    public function __construct()
    {
        $this->productos = [];
        $this->unidades = [];
    }

    //metodos

    /**
     * @param $codigo
     * añade un producto a la cesta
     */
    public function nuevoArticulo($codigo){

        if ($this->unidades[$codigo] > 0) {
            $this->unidades[$codigo] ++;
        } else {
            $producto = BD::obtieneProducto($codigo);
            $this->productos[] = $producto;
            $this->unidades[$codigo] = 1;
        }

    }

    public function getProductos(){

        return $this->productos;

    }

    public function getUnidades($codigo){

        return $this->unidades[$codigo];

    }

    /**
     * @return null
     * devuelve el total de todos los productos de la cesta.
     */
    public function coste(){

        $total = null;

        foreach ($this->productos as $producto) {

            $unidades = $this->unidades[$producto->getCodigo()];

            if ($unidades > 0){
                $total += $producto->getPvp() * $unidades;
            } else {
                $total += $producto->getPvp();
            }

        }

        return $total;

    }

    /**
     * Guarda en sesion la cesta.
     */
    public function guardaCesta(){

        session_start();
        $_SESSION['cesta'] = $this;

    }

    /**
     * @return mixed
     * Carga la cesta guardada en sesion.
     */
    public static function cargaCesta(){

        session_start();
        return $_SESSION['cesta'];

    }

    /**
     * @param $codigo
     * Elimina unidades de productos o el prodcuto de la cesta
     */
    public function borrar($codigo){

        //comprueba cuantas unidades de este producto hay y las rebeja o elimina.
        //si en unidades hay mas de un producto con este codigo.
        if ($this->unidades[$codigo] > 1){
            $this->unidades[$codigo] --;
        } else {
            unset($this->unidades[$codigo]);
            //ahora debo capturar el indice el array productos con el producto que quiero eliminar.
            for ($i = 0; $i < count($this->productos); $i++){
                //se utiliza array_splice para que no queden huecos en el array, reindexa automaticamente.
                if ($this->productos[$i]->getCodigo() == $codigo){
                    //indico, del array, la posicion $i quitame 1.
                    array_splice($this->productos,$i,1);
                }

            }
        }

    }

    /**
     * vacia los arrays de la cesta, dejandola con nada.
     */
    public function vaciar(){

        $this->productos = [];
        $this->unidades = [];

    }

}