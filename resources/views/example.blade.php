@extends('layouts.app1')

@section('title' , 'este es el titulo')


<h1> hola {{$name}} bienvenido</h1>


@section('content')

tu nombre {{$name}}<br>
tu apellido {{$apellido}}<br>
tu edad {{$edad}}<br>

@component('component.alert' , ['var' => 'mi variable'])

    @slot('title')

    advertencia

    @endslot


    <p>esto es un mensaje de alerta</p>
    
@endcomponent



@endsection