@extends('layouts.app')

@section('content')

    <h1>Recetas</h1>

    @foreach($recetas as $receta)
        <li> {{ $receta  }} </li>
    @endforeach

    <h1>categoria</h1>

    @foreach($categorias as  $categoria)
        <li> {{ $categoria  }} </li>
    @endforeach

@endsection
