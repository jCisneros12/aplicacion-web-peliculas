<?php

class Pelicula
{
    private $idPelicula;
    private $titulo;
    private $descripcion;
    private $anio;
    private $cantidadMeGusta;
    private $precioVenta;
    private $precioAlquiler;
    private $disponibilidad;
    private $poster;
    private $stock;
    private $genero;

    /* metodos de acceso setters y getters */

    public function getIdPelicula()
    {
        return $this->idPelicula;
    }

    public function setIdPelicula($idPelicula)
    {
        $this->idPelicula = $idPelicula;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function getCantidadMeGusta()
    {
        return $this->cantidadMeGusta;
    }

    public function setCantidadMeGusta($cantidadMeGusta)
    {
        $this->cantidadMeGusta = $cantidadMeGusta;
    }

    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }

    public function getPrecioAlquiler()
    {
        return $this->precioAlquiler;
    }

    public function setPrecioAlquiler($precioAlquiler)
    {
        $this->precioAlquiler = $precioAlquiler;
    }

    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;
    }

    public function getPoster()
    {
        return $this->poster;
    }

    public function setPoster($poster)
    {
        $file = $poster; //Asignamos el contenido del parametro a una variable para su mejor manejo

        $temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
        
        //Comenzamos a extraer la informaciÃ³n del archivo
        $fp = fopen($temName, "rb"); //abrimos el archivo con permiso de lectura

        $posterBin = fread($fp, filesize($temName)); //leemos el contenido del archivo
        
        $posterBin = addslashes($posterBin); //se escapan los caracteres especiales
        fclose($fp); //Cerramos el archivo

        $this->poster = $posterBin;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
}
