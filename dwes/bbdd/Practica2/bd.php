<?php

/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 8/04/17
 * Time: 10:22
 * Clase que contiene las funciones para conectar a cualquier bbdd que sea pasada.
 */
class bd
{

    /**
     * @param $host
     * @param $usuario
     * @param $password
     * @param $db
     * @return bool|PDO
     * Conecta a el servidor de base de datos o a una base de datos especifica.
     */
    public static function conectar($host,$usuario,$password, $db){

        try{

            //si existe el campo db devolvera una conexion solo de esa base de datos, si no, del servidor entero.
            if ($db == null){
                $conexion = new PDO("mysql:host=$host", "$usuario", "$password");
                $conexion->exec("SET NAMES 'utf8';");
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } else {
                $conexion = new PDO("mysql:host=". $host .";dbname=$db", "$usuario", "$password");
                $conexion->exec("SET NAMES 'utf8';");
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            if ($conexion){
                return $conexion;
            }

        } catch (PDOException $p){
            return false;
        }
    }

    /**
     * @param $connection
     * @return array
     * Devuelve array con todas las base de datos existentes en el servidor.
     */
    public static function listBbdd($connection){

        $sql = 'SHOW DATABASES';
        $result = $connection->query($sql);

        while (($fila = $result->fetchColumn(0)) !== false ){
            $databases[] = $fila;
        }

        return $databases;
    }

    /**
     * @param $connection
     * @return array
     * Devuelve array con todas las tablas de una bbdd
     */
    public static function listTables($connection){

        $sql = 'SHOW TABLES';
        $result = $connection->query($sql);

        while (($fila = $result->fetchColumn(0)) !== false ){
            $tables[] = $fila;
        }

        return $tables;
    }

    /**
     * @param $field
     * @return bool
     * Comprueba que los campos del formulario no estén vacíos o contengan cactacteres erroneos.
     */
    public static function checkFields($field){

        if ($field != ""){
            //meto en la variable el campo saneado (quitara caracteres que no deben ir)
            $field = filter_var($field, FILTER_SANITIZE_STRING);
            //vuelvo a comprobar que no este vacio por si todos el campo fuera caracteres no adminitos.
            if ($field == ""){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }

    }

    /**
     * @param $query
     * @return mixed
     * Devuelve los nombres de las columnas de una tabla.
     */
    public static function getColumsnName($conection, $table){

        $query = $conection->prepare("DESCRIBE " . $table);
        $query->execute();
        $table_fields = $query->fetchAll(PDO::FETCH_COLUMN);
        return $table_fields;

    }

    /**
     * @param $conection
     * @param $table
     * @return mixed
     * Devuelve un array con todos los campos de las filas.
     */
    public static function selectAllTable($conection, $table){

        $select = $conection->prepare('SELECT * FROM ' . $table);
        $select->execute();
        return $select->fetchAll();

    }

    /**
     * @param $conection
     * @param $table
     * @param $column
     * @param $value
     * @return mixed
     * Saca todos los datos de una fila y los devuelve.
     */
    public static function selectRow($conection, $table, $column, $value){

        try{

            $select = $conection->prepare('SELECT * FROM ' . $table . ' WHERE ' . $column . ' = "' . $value . '"');
            $select->execute();
            return $select->fetchAll();

        }catch (PDOException $e){
            echo "<br>" . $e->getMessage();
        }

    }

    /**
     * @param $conection
     * @param $table
     * @param $id
     * @param $value
     * @return bool
     * Elimina una fila de la tabla.
     */
    public static function deleteRow($conection, $table, $id, $value){

        try{

            $delete = 'DELETE FROM ' . $table . ' WHERE ' . $id . ' = "' . $value .'"';
            $conection->exec($delete);
            return true;

        }catch (PDOException $e){
            echo '<div class="resultado">';
            echo '<span class="correcto">'. $e->getMessage() .'</span>';
            echo '</div>';
            return false;
        }

    }

    /**
     * @param $conection
     * @param $table
     * @param $columns
     * @param $values
     * @return mixed
     * Inserta campos en cualquier tabla.
     */
    public static function insertRow($conection, $table, $columns, $values){

        try{
            //se crea un str con los campos separados por comas, para meterlos luego en el prepare.
            $campos = "";
            for ($i = 0; $i < count($columns); $i++){

                if ($i+1 < count($columns)){
                    $campos .= $columns[$i] . ", ";
                }else {
                    $campos .= $columns[$i];
                }
            }
            $camposPreparados = "";
            //se crea un str con los valores separados por comas.
            for ($j = 0; $j < count($columns); $j++){

                if ($j+1 < count($columns)){
                    $camposPreparados .= ":" . $columns[$j] . ", ";
                }else {
                    $camposPreparados .= ":" . $columns[$j];
                }

            }

            $insert = $conection->prepare("INSERT INTO $table ($campos) VALUES ($camposPreparados)");
            //meto en variables los values y preparo los campos
            $parametros = array();
            for ($i = 0; $i < count($columns); $i++){
                $parametros[":".$columns[$i]] = $values[$i];
            }
            //ejecuto
            return $insert->execute($parametros);

        }catch (PDOException $e){
            echo '<div class="resultado">';
            echo '<span class="correcto">'. $e->getMessage() .'</span>';
            echo '</div>';
        }

    }

    /**
     * @param $antiguos
     * @param $nuevos
     * @return array
     * Comprueba entre dos arrays asociativos que valores se han cambiado y devuelve un nuevo array asociativo con los cambiados.
     */
    public static function checkUpdates($antiguos, $nuevos){

        $changes = array();

        foreach ($antiguos[0] as $key => $value) {

            if ($nuevos[$key]){
                if ($value != $nuevos[$key]){
                    $changes[$key] = $nuevos[$key];
                }
            }

        }

        return $changes;

    }

    /**
     * @param $conection
     * @param $table
     * @param $changes
     * @param $campoPrimario
     * @param $valorPrimario
     * @return mixed
     * Prepara el update PDO y actualiza la fila (da igual cuantos campos cambie uno o varios.)
     */
    public static function updateRow($conection,$table,$changes,$campoPrimario, $valorPrimario){

        //compruebo si es solo un cambio o mas de uno para crear una sentencia simple o compuesta
        if (count($changes) > 1){

            $counter = 0;
            $binds = "";
            //creamos los bind con los nombres de sus columnas
            foreach ($changes as $key => $value) {
                //esto indica que es el ultimo elemento
                if ($counter == count($changes) -1){
                    $binds .= $key . " = " . ":".$key;
                } else {
                    $binds .= $key . " = " . ":".$key.",";
                }

                $counter++;
            }

            try{

                //preparamos el sql en formato bind (update tabla set x = :x where campoclave = clave).
                $sql = 'UPDATE ' . $table . ' SET ' . $binds . ' WHERE ' . $campoPrimario . ' = "' . $valorPrimario . '"';

                $update = $conection->prepare($sql);
                //ahora asociamos los bind params
                foreach ($changes as $key => $value) {
                    $update->bindParam(":".$key, $value);
                }

                return $update->execute();

            }catch (PDOException $e){
                echo "<br/>" . $e->getMessage();
            }


        }else{

            //creamos los bind con los nombres de sus columnas
            foreach ($changes as $key => $value) {
                $binds = $key . " = " . ":".$key;
            }

            try{

                //preparamos el sql en formato bind (update tabla set x = :x where campoclave = clave).
                $sql = 'UPDATE ' . $table . ' SET ' . $binds . ' WHERE ' . $campoPrimario . ' = "' . $valorPrimario . '"';

                $update = $conection->prepare($sql);
                //ahora asociamos los bind params
                foreach ($changes as $key => $value) {
                    $update->bindParam(":".$key, $value);
                }

                return $update->execute();

            }catch (PDOException $e){
                echo "<br/>" . $e->getMessage();
            }

        }

    }


}