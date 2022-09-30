<?php

namespace MisClases;

class Usuario{
    public $nombre;
    public $email;
    
    public function __construct() {
        $this->nombre = "Blue's Laboratory";
        $this->email = "blue@lab.com";
    }
}
