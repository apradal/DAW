<?php

/**
 * Class ConectarInsertSelect
 * Clase que me permite conectarme a una base de datos, insertar y seleccionar
 */
class ConectarInsertSelect
{

    /**
     * @param $usuario
     * @param $password
     * @param $bd
     * @return bool|PDO
     * Conecta a la bbdd y te devuelve el objeto PDO o falso.
     */
    public static function conectar($usuario,$password,$bd){

        try{

            $conexion = new PDO("mysql:host=localhost;dbname=$bd", "$usuario", "$password");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($conexion){
                return $conexion;
            }

        } catch (PDOException $p){
            return false;
        }
    }

    /**
     * @param PDO $conexion
     * @param $sentencia
     * @param $parametros
     * Imprime el select o el error.
     */
    public static function consulta($usuario,$password,$bd,$sentencia,$parametros){

        try{

            $conexion = self::conectar($usuario,$password,$bd);
            $select = $conexion->prepare($sentencia);
            $select->execute($parametros);

            echo '<b>PRODUCTO</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>UNIDADES</b><br/>';
            $str = "";
            while ($resultado = $select->fetch()){
                $str .= $resultado['producto'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $resultado['unidades'] . '<br/>';
            }
            echo "$str <br/>";

        }catch(PDOException $p){
            echo "Error " . $p->getMessage() . "<br/>";
        }

    }

    public static function insertar($usuario,$password,$bd,$sentencia,$parametros){

        try{

            $conexion = self::conectar($usuario,$password,$bd);
            $insert = $conexion->prepare($sentencia);
            if ($insert->execute($parametros)) echo 'Fila insertada';

        }catch (PDOException $p){
            echo "Error " . $p->getMessage() . "<br/>";
        }

    }

}