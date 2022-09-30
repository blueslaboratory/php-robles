<!--
Video 341:
-->

<h1>Formulario en Laravel 8</h1>
<form action="{{ action('\App\Http\Controllers\PeliculaController@recibir') }}" method="POST">
    {{ csrf_field() }}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />
    <br/>
    
    <label for="email">Correo</label>
    <input type="email" name="email" />
    <br/>
    
    <input type="submit" value="Enviar" />
</form>