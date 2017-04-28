<?php

class Producto
{

    //atributos
    private $codigo, $nombre, $nombre_corto, $pvp, $familia, $descripcion;

    //contructor

    public function __construct($row)
    {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->pvp = $row['PVP'];
        $this->familia = $row['familia'];
        $this->descripcion = $row['descripcion'];

    }


    //metodos getters
    public function getCodigo(){

        return $this->codigo;

    }

    public function getNombre(){

        return $this->nombre;

    }

    public function getNombreCorto(){

        return $this->nombre_corto;

    }

    public function getPvp(){

        return $this->pvp;

    }

    public function getFamilia(){

        return $this->familia;
    }

    public function getDescripcion(){

        return $this->descripcion;

    }

}