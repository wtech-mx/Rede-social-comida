@extends('layouts.app')

@section('content')

    <article class="contenido-receta">
        <h1 class="text-center mb-4">
            {{$receta->titulo}}
        </h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen  }}" class="w-100">
        </div>

        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{$receta->categoria->nombre}}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor: </span>

                {{--Mostrar el ususario--}}
                {{$receta->autor->name}}
            </p>
        </div>

        <div class="fecha">
            <h2 class="my-3 text-primary">Fecha: </h2>

            @php
                $originalDate = $receta->created_at;
                $newDate = date("d/m/Y", strtotime($originalDate));
            @endphp

            {{$newDate}}
        </div>

        <div class="ingredientes">
            <h2 class="my-3 text-primary">Ingredientes: </h2>
            {!! $receta->ingredientes !!}
        </div>

        <div class="Prepapracion">
            <h2 class="my-3 text-primary">Prepapracion: </h2>
            {!! $receta->preparacion !!}
        </div>

    </article>

@endsection
