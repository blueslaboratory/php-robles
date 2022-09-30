<!--
335. Plantillas base o layout
-->

@extends('layouts.master')

@section('titulo', 'Master en PHP')

@section('header')
    @parent()
    <h2>hola</h2>
@stop

@section('content')
    <h1>Contenido de la pagina generica</h1>
@stop
