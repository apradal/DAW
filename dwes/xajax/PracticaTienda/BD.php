<?php
require_once('Producto.php');
require_once('Ordenador.php');

/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 19/04/17
 * Time: 17:16
 */
class BD
{
    //atributo privado de la conexion
    private static $conexion;

    /**
     * Conecta con la bbdd dwes y asignar al parametro la conexion para que la utilicemos con otros metodos.
     */
    private static function conectar(){

        $usuario = 'root';
        $password = 'tonito22';

        try{

            $conexion = new PDO("mysql:host=localhost;dbname=dwes", "$usuario", "$password");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e){
            die ('Abortamos la aplicación por fallo conectando con la BD' . $e->getMessage());
        }
        //si se ha conectado se indica el atributo com conexion pdo.
        self::$conexion = $conexion;

    }

    /**
     * @param $sql
     * @param $valores
     * @return null
     * Ejecuta consultas sql y devuelve el resultado
     */
    protected static function ejecutaConsulta($sql,$valores) {
        //si la conexion ha expirado se vuelve a crear.
        if (self::$conexion == null){
            self::conectar();
        }
        //creo objeto pdo con la conexion.
        $conexion = self::$conexion;
        try{
            $consulta = $conexion->prepare($sql);
            $consulta->execute($valores);
        }catch (PDOException $e) {
            echo 'No se ha podido ejecutar la consulta: ' . $e->getMessage();
            return null;
        }
        return $consulta;

    }

    /**
     * @param $user
     * @param $pass
     * Comprueba que el usuario existe en la bbdd
     */
    public static function verificarCliente($user, $pass){
        //creo el array con variables ya que pdo solo acepta variables en sus campos :campo
        $valores = array('usuario'=>$user, 'password'=>$pass);
        //creo el sql con los campos
        $sql = <<<FIN
        SELECT username FROM usuarios 
        WHERE username=:usuario
        AND password=:password
FIN;
        //llamo a la funcion para sacar datos de usuarios.
        $resultado = self::ejecutaConsulta ($sql,$valores);
        $verificado = false;
        //si no es nula y hace fetch verificar es true
        if ($resultado->fetch()){
            $verificado=true;
        }
        return $verificado;
        
    }

    /**
     * @return bool
     * Devuelve todos los campos de producsto de la tabla producto.
     */
    public static function obtieneProductos(){

        $sql = 'SELECT * FROM producto';

        //llamo a la funcion para sacar datos de usuarios.
        $resultado = self::ejecutaConsulta ($sql);
        //variable de control y de almacenamiento de objetos
        $productosObjetos = [];
        //si no es nula y hace fetch crear cada objeto y meter dicho objetos en un array
        while ($fila = $resultado->fetch()){
            $arrayFila = ['cod' => $fila['cod'], 'nombre' => $fila['nombre'], 'nombre_corto' => $fila['nombre_corto'],
                'PVP' => $fila['PVP'], 'familia' => $fila['familia'], 'descripcion' => $fila['descripcion']];
            $producto = new Producto($arrayFila);
            $productosObjetos[] = $producto;
        }
        return $productosObjetos;

    }

    /**
     * @param $codigo
     * @return Producto
     * Devuelve un objeto producto con codigo nombre y pvp
     */
    public static function obtieneProducto($codigo){

        $sql = 'SELECT cod, nombre_corto, PVP FROM producto WHERE cod = :codigo';

        //llamo a la funcion para sacar el producto.
        $valores = array('codigo'=>$codigo);
        $resultado = self::ejecutaConsulta ($sql, $valores);

        //si no es nula y hace fetch crear cada objeto y meter dicho objetos en un array
        $fila = $resultado->fetch();
        //la clase producto espera recibir un array asi que meto los datos del fetch en un array;
        $row = ['cod' => $fila['cod'], 'nombre_corto' => $fila['nombre_corto'], 'PVP' => $fila['PVP']];
        $producto = new Producto($row);

        return $producto;

    }

    public static function obtenerOrdenador($codigo){

        $sql = 'SELECT * FROM ordenador WHERE cod = :codigo';

        //llamo a la funcion para sacar el ordenador.
        $valores = array('codigo'=>$codigo);
        $resultado = self::ejecutaConsulta ($sql, $valores);

        //si no es nula y hace fetch crear cada objeto y meter dicho objetos en un array
        $fila = $resultado->fetch();
        //la clase producto espera recibir un array asi que meto los datos del fetch en un array;
        $row = ['cod' => $fila['cod'], 'procesador' => $fila['procesador'], 'RAM' => $fila['RAM'],
            'disco' => $fila['disco'], 'grafica' => $fila['grafica'], 'unidadoptica' => $fila['unidadoptica'], 'SO' => $fila['SO'], 'otros' => $fila['otros']];
        $ordenador = new Ordenador($row);

        return $ordenador;

    }

}