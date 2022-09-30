<!--
374. Subir imagenes
375. Listado de imagenes
376. Maquetación de las tarjetas
377. Paginación en Laravel
378. Maquetación de Likes
379. Número de comentarios
380. Detalle de la imagen
391. Detectar likes
394. Peticiones AJAX
396. Listar likes
-->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @include('includes.message')
            @foreach($images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
            
            <!-- PAGINACION -->
            <div class="clearfix"></div>
            {{$images->links()}}
            
        </div>
        
    </div>
</div>
@endsection
