<?php

// http://localhost/master-php/aprendiendo-php-poo/07-interfaces/

interface Ordenador{
    public function encender();
    public function apagar();
    public function reiniciar();
    public function desfragmentar();
    public function detectarUSB();
}


class iMac implements Ordenador{
    private $modelo;
    
    function getModelo() {
        return $this->modelo;
    }

    function setModelo($modelo): void {
        $this->modelo = $modelo;
    }
    public function encender() {
        
    }
    public function apagar() {
        
    }
    public function reiniciar() {
        
    }
    public function desfragmentar() {
        
    }
    public function detectarUSB() {
        
    }
    // Si comentas 1 de los metodos del implements, esto no funciona
}

$maquintosh = new iMac();
$maquintosh->setModelo('Macbook Pro 2021');
echo $maquintosh->getModelo();
var_dump($maquintosh);