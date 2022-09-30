<?php
// src/Controller/LuckyController3.php
// http://aprendiendo-symfony.com.devel/lucky/numbertwig

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController3 extends AbstractController
{
/**
* @Route("/lucky/numbertwig")
*/
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
?>