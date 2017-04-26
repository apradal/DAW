<?php

class Ordenador
{

    //atributos
    private $codigo, $procesador, $ram, $disco, $grafica, $optica, $so, $otros;

    //contructor

    public function __construct($row)
    {
        $this->codigo = $row['cod'];
        $this->procesador = $row['procesador'];
        $this->ram = $row['RAM'];
        $this->disco = $row['disco'];
        $this->grafica = $row['grafica'];
        $this->optica = $row['unidadoptica'];
        $this->so = $row['SO'];
        $this->otros = $row['otros'];
    }

    //metodos get
    public function getCodigo(){

        return $this->codigo;

    }

    public function getProcesador(){

        return $this->procesador;

    }

    public function getRam(){

        return $this->ram;

    }

    public function getDisco(){

        return $this->disco;

    }

    public function getGrafica(){

        return $this->grafica;

    }

    public function getOptica(){

        return $this->optica;

    }

    public function getSo(){

        return $this->so;

    }

    public function getOtros(){

        return $this->otros;

    }

}