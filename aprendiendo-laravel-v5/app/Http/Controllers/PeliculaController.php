<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 336. Controladores básicos
// 338. Enlaces en Laravel
class PeliculaController extends Controller
{
    public function index($pagina = 1){
        $titulo = 'Listado de mis peliculas';
        
        return view('pelicula.index', [
            'titulo' => $titulo,
            'pagina' => $pagina
        ]);
    }
    
    public function detalle($year = null){
        //echo "<h1>Detalle de la pelicula</h1>";
        return view('pelicula.detalle');
    }
    
    // 339. Redirecciones
    public function redirigir(){
        // return redirect()->action('PeliculaController@detalle');
        return redirect()->route('detalle.pelicula');
    }
    
    
    // 341. Formularios en Laravel
    public function formulario(){
        return view('pelicula.formulario');
    }
    
    public function recibir(request $request){
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        
        return "El nombre es $nombre y el email es $email";
        
        //var_dump($nombre);
        die();
    }
}
