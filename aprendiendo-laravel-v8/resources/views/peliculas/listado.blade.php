@include('includes.header')
@include('includes.header')
@include('includes.header')

<h1><?=$titulo?></h1>
<h2><?=$listado[0]?></h2>

<!-- 
Video: 329, 330, 331, 332, 333, 334
Es recomendable utilizar la sintaxis de blade que es la que vemos
a continuacion, son los corchetes, no se puede poner aqui en el comentario
porque se traba la pagina:

Mas documentacion:
https://laravel.com/docs/8.x/views
https://laravel.com/docs/8.x/blade
-->

<!-- IMPRIMIR POR PANTALLA -->
<h2>{{$listado[2]}}</h2>
<p>{{ date('Y') }}</p>
<p>{!! date('d-m-y') !!}</p>


<!-- COMENTARIOS -->
<!-- Esto es un comentario html -->
<?php
// Esto es un comentario php
?>
{{-- ESTO ES UN COMENTARIO DE BLADE --}}


<!-- MOSTRAR SI EXISTE -->
{{-- Relacion ternaria en Blade --}}
<?= isset($director) ? $director : 'No hay director. '; ?>

<?= $director = 'Skinner' ?>
{{ $director or 'No hay ningun director' }}


<!-- CONDICIONALES -->
@if($titulo && count($listado) >=2 )
    <h1>El titulo existe y es este: {{$titulo}} y el listado es mayor a 2</h1>
@elseif($titulo)
    <h1>El titulo existe y el listado NO ES MAYOR A 2</h1>
@else
    <h1>El titulo no existe</h1>
@endif


<!-- BUCLES -->
@for($i = 0; $i <=20; $i++)
    El numero es: {{$i}} <br/>
@endfor

<hr/>

<?php $contador = 1 ?>
@while($contador < 50)
    @if($contador % 2 == 0)
        NUMERO PAR: {{ $contador }} </br>
    @endif
    
    <?php $contador ++; ?>
@endwhile

<hr/>

@foreach($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach


@include('includes.footer')