<h1>{{$titulo}}</h1>
<p>(accion index del controlador PeliculasController)</p>

@if(isset($pagina))
    <h3>La pagina es {{$pagina}}</h3>
@endif

<!--
338. Enlaces en Laravel
-->
<a href="{{ action('PeliculaController@detalle') }}">action: Ir al detalle</a>
<br/>
<a href="{{ route('detalle.pelicula', ['id' => 12]) }}">route: Ir al detalle</a>