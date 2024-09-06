@extends('layout.app1')

@section('title, 'este es el titulo')

@section('sidebar')
    @parent
    <p> este es el mensaje desde la vista hija </p>
@endsection

@section('content')
    <p> este es el contenido de la vista hija  </p>
    <hr>
@endsection