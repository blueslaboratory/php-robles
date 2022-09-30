<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MiFiltroExtension extends AbstractExtension {

    public function getFilters(): array {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('multiplicar', [$this, 'multiplicar']),
        ];
    }

    public function getFunctions(): array {
        return [
            new TwigFunction('multiplicar', [$this, 'multiplicar']),
        ];
    }

    public function multiplicar($numero) {
        $tabla = "<h1>Tabla del $numero </h1>";
        for($i=0; $i<=10; $i++){
            $tabla .= "$i x $numero = ".($i*$numero)."<br>";
        }
        
        return $tabla;
    }
    

    //Video 430
    //Comando para generar esta clase:
    //F:\wamp64-2\www\master-php\aprendiendo-symfony-v4>php bin/console make:twig-extension MiFiltro
    //
    //Esta clase nos permite crear un filtro y una funcion a la vez
}

