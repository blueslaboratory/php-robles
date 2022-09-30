<?php
//328. Vistas en Laravel
//329. Interpolación en Blade
//330. Comentarios en Blade
//331. Mostrar cuando existe
//332. If en las vistas
//333. Bucles en las vistas
//334. Includes en las vistas

?>

<!-- incluyendo vistas dentro de otras vistas -->
@include('includes.header')
@include('includes.header')
@include('includes.header')


<!-- IMPRIMIR POR PANTALLA -->
<h1><?=$titulo?></h1>
<h1>{{$titulo}}</h1>
<h2><?=$listado[2]?></h2>
<p>{{!! date('Y') !!}}</p>
<hr>    

<!-- COMENTARIOS -->
<!-- This is a HTML comment -->
{{-- ESTO ES UN COMENTARIO EN BLADE --}}
<hr>

<!-- MOSTRAR SI EXISTE -->
<?= isset($director) ? $director : 'No hay director</br>' ?>
{{ $director or 'No hay ningun director</br>' }}
<hr>

<!-- CONDICIONALES -->
@if($titulo && count($listado) >= 2 )
    <h1>El titulo existe y es este: {{$titulo}} y el listado > 2 </h1>
@elseif($titulo)
    <h1>El titulo existe y el listado < 2 </h1>
@else
    <h1>La condicion no se ha cumplido </h1>
@endif
<hr>


<!-- BUCLES -->
<h1>Bucles</h1>
@for($i = 0; $i <= 20; $i++)
    El numero es: {{$i}} <br/>
@endfor

<h2>Numeros pares</h2>
<?php $contador = 1 ?>
@while($contador < 50)
    @if($contador % 2 == 0)
        NUMERO PAR: {{$contador}} <br/>
    @endif
    
    <?php $contador++; ?>
@endwhile

<h2>Peliculas</h2>
@foreach($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach


@include('includes.footer')