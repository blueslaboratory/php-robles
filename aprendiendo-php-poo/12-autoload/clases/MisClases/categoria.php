<?php

namespace MisClases;

class Categoria{
    public $nombre;
    public $descripcion;
    
    public function __construct() {
        $this->nombre = "Rol";
        $this->descripcion = "Dungeons and Dragons";       
    }
}