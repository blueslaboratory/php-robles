<?php

// src/Controller/LuckyController.php
// http://aprendiendo-symfony.com.devel/lucky/number2

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController2 {

     /**
      * @Route("/lucky/number2")
      */
    public function number() {
        $number = random_int(0, 100);

        return new Response(
                '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

}
