<?php

// src/Controller/HomeController.php
// http://aprendiendo-symfony.com.devel/home

// Ruta yaml en config/routes/routes.yaml
// http://aprendiendo-symfony.com.devel/inicio

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hello' => 'Hola Mundo con Symfony 4.4'
        ]);
    }
    
    
    // Video 417, 424
    // http://aprendiendo-symfony.com.devel/animales/alex
    // http://aprendiendo-symfony.com.devel/animales/
    // http://aprendiendo-symfony.com.devel/animales/alex/diez
    public function animales($nombre, $apellidos){
        $title = 'Bienvenido a la pagina de Animales';
        $animales = array('perro', 'gato', 'loro', 'marmota');
        $aves = array(
            'tipo' => 'palomo',
            'color' => 'gris',
            'edad' => 4,
            'raza' => 'colillano'
            );
        
        return $this->render('home/animales.html.twig', [
            'title' => $title,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'animales' => $animales,
            'aves' => $aves
            
        ]);
    }
    
    
    // Video 420
    // http://aprendiendo-symfony.com.devel/redirigir
    public function redirigir(){
//        return $this->redirectToRoute('animales', [
//           'nombre'  => 'Juan Pedro',
//           'apellidos' => 'Lopez'
//        ]);
//        
//        
//        Borrar la carpeta var/cache
//        return $this->redirectToRoute('index');
//        return $this->redirectToRoute('index', array(), 301);
        
        return $this->redirect('https://victorroblesweb.es/academy');
        
    }
    
}
