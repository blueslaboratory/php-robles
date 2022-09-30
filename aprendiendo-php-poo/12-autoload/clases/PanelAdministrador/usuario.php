<?php

namespace PanelAdministrador;

class Usuario{
    public $nombre;
    public $email;
    
    public function __construct() {
        $this->nombre = "Valentino Rossi";
        $this->email = "valentino@lab.com";        
    }
    
    function informacion(){
        echo __NAMESPACE__;
    }
}
/*
 * Esta clase tambien se va a estar cargando cuando cargo el namespace,
 * pero no lo puedo utilizar al no tener un namespace definido correctamente,
 * pero lo vamos a solucionar
 */