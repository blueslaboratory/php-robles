<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Video: 324, 325, 326, 340

// http://localhost/master-php/aprendiendo-laravel-v8/public/
// http://aprendiendo-laravel.com.devel/

// Para que esta URL funcione, ha habido que editar aqui:
// F:\wamp64-2\bin\apache\apache2.4.51\conf\extra\httpd-vhosts.conf

// Esta ruta lo que va a ejecutar es un bloque de instrucciones, 
// ya sea una vista, un texto o una funcionalidad

Route::get('/', function () {
    return view('welcome');    
    // echo "<h1>Hola Mundo!</h1>";
});

// http://aprendiendo-laravel.com.devel/peliculas
// http://aprendiendo-laravel.com.devel/peliculas/3
/* 
 * En la version 8 de laravel no se puede utilizar la sintaxis abreviada:
 * 'PeliculaController@index'
 * Hay que indicar la ruta completa del controlador
 * 'App\Http\Controllers\PeliculaController@index'
 * 
 * Source: https://es.stackoverflow.com/questions/400514/por-que-laravel-no-encuentra-el-controlador
 */
// Route::get('/peliculas/{pagina?}', 'PeliculaController@index'); -> NO EN Laravel 8
// Route::get('/peliculas/{pagina?}', 'App\Http\Controllers\PeliculaController@index')->name('index');
Route::get('/peliculas/{pagina?}', 'App\Http\Controllers\PeliculaController@index');

// http://aprendiendo-laravel.com.devel/detalle
// http://aprendiendo-laravel.com.devel/detalle/2019
// F:\wamp64-2\www\master-php\aprendiendo-laravel-v8>php artisan route:list
Route::get('/detalle/{year?}', [
    'middleware' => 'App\Http\Middleware\TestYear', //'TestYear' no funciona :'(
    'uses' => 'App\Http\Controllers\PeliculaController@detalle',
    'as'   => 'detalle.pelicula'
]);
// http://aprendiendo-laravel.com.devel/redirigir
Route::get('/redirigir', 'App\Http\Controllers\PeliculaController@redirigir');

// http://aprendiendo-laravel.com.devel/formulario
Route::get('/formulario', '\App\Http\Controllers\PeliculaController@formulario');
// http://aprendiendo-laravel.com.devel/recibir
Route::post('/recibir', '\App\Http\Controllers\PeliculaController@recibir');

// http://aprendiendo-laravel.com.devel/usuario
// http://aprendiendo-laravel.com.devel/detalle
Route::resource('usuario', 'App\Http\Controllers\UsuarioController');


// Rutas de fruta
// http://aprendiendo-laravel.com.devel/frutas/index

Route::group(['prefix'=>'frutas'], function(){
    Route::resource('index', '\App\Http\Controllers\FrutaController@index');
});

/*
use App\Http\Controllers\FrutaController; //App\Http\Controllers\FrutaController
Route::prefix('frutas')->group(function(){
    Route::get('/index', [FrutaController::class, 'index']);
});

// Route::get('/frutas', '\App\Http\Controllers\FrutaController@index');

/*
GET: Conseguir datos
POST: Guardar datos
PUT: Actualizar recursos
DELETE: Eliminar recursos
 */

// http://aprendiendo-laravel.com.devel/mostrar-fecha
/*
Route::get('/mostrar-fecha', function(){
    $titulo = 'Estoy mostrando la fecha';
    return view('mostrar-fecha', array(
        'titulo' => $titulo
    ));
});



// http://aprendiendo-laravel.com.devel/pelicula/batman
// http://aprendiendo-laravel.com.devel/pelicula/The lord of the Rings
// http://aprendiendo-laravel.com.devel/pelicula
// http://aprendiendo-laravel.com.devel/pelicula/hola/3033

// Route::get('/pelicula/{titulo?}'
// {titulo?}: Quiere decir que el parametro titulo es opcional


Route::get('/pelicula/{titulo}/{year?}', function($titulo = 'No hay una pelicula seleccionada', $year = 2021){
    return view('pelicula', array(
        'titulo' => $titulo,
        'year'   => $year
    ));
})->where(array(
    'titulo' => '[a-zA-Z]+',
    'year'   => '[0-9]+'
));


Route::get('/listado-peliculas', function(){
    
    $titulo = "Listado de peliculas";
    $listado = array('Batman: The Dark Knight',
                     'Gattaca',
                     'Gran Torino');
    
    /*
    return view('peliculas.listado', array(
        'titulo' => $titulo
    ));
    */
    /*
    return view('peliculas.listado')
            ->with('titulo', $titulo)
            ->with('listado', $listado);
});


// http://aprendiendo-laravel.com.devel/pagina-generica
Route::get('/pagina-generica', function(){
    
    return view('pagina');
});

*/