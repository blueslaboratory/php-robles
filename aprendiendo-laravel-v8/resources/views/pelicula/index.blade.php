<!-- 
http://aprendiendo-laravel.com.devel/peliculas
-->

<h1>{{$titulo}}</h1>
<p>(accion index del controlador PeliculaController)</p>

@if(isset($pagina))
    <h3>La pagina es {{$pagina}}</h3>
@endif

<a href="{{ action('App\Http\Controllers\PeliculaController@detalle') }}">Ir al detalle</a>
<br>
<a href="{{ route('detalle.pelicula') }}">Ir al detalle por route</a>