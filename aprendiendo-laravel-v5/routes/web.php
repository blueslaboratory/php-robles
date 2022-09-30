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




// 336. Controladores básicos
// http://aprendiendo-laravel.com.devel/peliculas
Route::get('/peliculas/{pagina?}', 'PeliculaController@index');

// 337. Controladores Resource
// http://aprendiendo-laravel.com.devel/detalle
//Route::get('/detalle', 'PeliculaController@detalle');
// 340. Middlewares
// http://aprendiendo-laravel.com.devel/detalle/2019
Route::get('/detalle/{year?}', [
    'middleware' => 'testyear',
    'uses' => 'PeliculaController@detalle',
    'as' => 'detalle.pelicula'
]);

// http://aprendiendo-laravel.com.devel/usuario/create
Route::resource('usuario', 'UsuarioController');

// 339. Redirecciones
// http://aprendiendo-laravel.com.devel/redirigir
Route::get('/redirigir', 'PeliculaController@redirigir');

// 341. Formularios en Laravel
// http://aprendiendo-laravel.com.devel/formulario
Route::get('/formulario', 'PeliculaController@formulario');
Route::post('/recibir', 'PeliculaController@recibir');

// 346. Listar datos
// 347. Mostrar una fila
// 351. Editar registros
// http://aprendiendo-laravel.com.devel/frutas/index
// http://aprendiendo-laravel.com.devel/frutas/detail/8
// http://aprendiendo-laravel.com.devel/frutas/crear
Route::group(['prefix'=>'frutas'], function(){
    Route::get('index', 'FrutaController@index');
    Route::get('detail/{id}', 'FrutaController@detail');
    Route::get('crear', 'FrutaController@create');
    Route::post('save', 'FrutaController@save');
    Route::get('delete/{id}', 'FrutaController@delete');
    Route::get('editar/{id}', 'FrutaController@edit');
    Route::post('update', 'FrutaController@update');
});






// 324. Rutas básicas
// En las rutas solo deberia de haber logica y mandar a cargar una vista
Route::get('/', function () {
    return view('welcome');
    // echo "<h1>Hola Mundo !!</h1>";
});

/*
 GET: conseguir datos
 POST: guardar datos
 PUT: actualizar recursos
 DELETE: eliminar recursos
 */


// http://aprendiendo-laravel.com.devel/mostrar-fecha
Route::get('/mostrar-fecha', function(){
    $titulo = "Mostrar la Fechita";
    return view('mostrar-fecha', array(
        'titulo' => $titulo
    ));
});


// 325. Parámetros en las rutas
// aprendiendo-laravel.com.devel/pelicula/batman
// http://aprendiendo-laravel.com.devel/pelicula/el senor de los anillos
// http://aprendiendo-laravel.com.devel/pelicula
// http://aprendiendo-laravel.com.devel/pelicula/BladeRunner/2049
Route::get('/pelicula/{titulo?}/{year?}', function($titulo = 'No hay una pelicula seleccionada', $year = 2022){
    
    return view('pelicula', array(
        'titulo' => $titulo,
        'year'   => $year
    ));
    
}) ->where(array(
    // especificamos la secuencia de caracteres que puede contener titulo
    'titulo' => '[a-zA-Z]+',
    'year'   => '[0-9]+'
));


// 328. Vistas en Laravel
// http://aprendiendo-laravel.com.devel/listado-peliculas
Route::get('/listado-peliculas', function(){
    $titulo = "Listado de peliculas";
    $listado = array('Batman', 'Thor', 'Thormenta', 'Thormento');
    
    /*
    return view('peliculas.listado', array(
       'titulo' => $titulo
    ));
    */
    
    return view('peliculas.listado')
        ->with('titulo', $titulo)
        ->with('listado', $listado);
});


// 335. Plantillas base o layout
// http://aprendiendo-laravel.com.devel/pagina-generica
Route::get('/pagina-generica', function(){
    return view('pagina');
});