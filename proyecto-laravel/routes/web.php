<?php

//365. Formulario de configuración
//366. Recibir los datos del formulario de configuración
//370. Mostrar avatar
//374. Subir imagenes
//376. Maquetación de las tarjeta
//380. Detalle de la imagen
//389. Método Like
//390. Método dislike
//396. Listar likes
//398. Perfil de usuario
//402. Eliminar imagen
//404. Formulario de edición de imagenes
//406. Página de gente
//407. Método del buscador

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

//361. Probando el ORM
//362. Login y registro de usuarios (Auth Laravel 5)

//use App\Image;

Route::get('/', function () {
    
    // sacando todas las imagenes de la DB
    /*
    DB::table('frutas')
            ->orderBy('id', 'desc')
            ->get();
    */
    // el codigo de arriba se reduce en 1 linea
    
    /*
    $images = Image::all();
    foreach($images as $image){
        // todo genial, no hay que hacer una query con el query builder
        echo $image->image_path."<br/>";
        echo $image->description."<br/>";
        //var_dump($image->user);
        echo $image->user->name.' '.$image->user->surname.'<br/>';
        
        if(count($image->comments)>0){
            echo '<h4> Comentarios</h4>';
            foreach($image->comments as $comment){
                echo $comment->user->name.' '.$comment->user->surname.': ';
                echo $comment->content.'<br/>';
            }
        }
        
        echo 'LIKES: '.count($image->likes);
        echo "<hr/>";
        //var_dump($image);
    }
    
    die();
    */
    
    return view('welcome');
});



//http://proyecto-laravel.com.devel/login

//GENERALES
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//USUARIO
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
Route::get('/gente/{search?}', 'UserController@index')->name('user.index');

//IMAGEN
Route::get('/subir-imagen', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/imagen/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::get('/imagen/editar/{id}', 'ImageController@edit')->name('image.edit');
Route::post('/image/update', 'ImageController@update')->name('image.update');

//COMENTARIO
Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

//LIKES
Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');



