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
                <a href="{{route('categorias.show',['categoriaReceta' => $receta->categoria->id])}}">
                    {{$receta->categoria->nombre}}
                </a>

            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor: </span>
                <a href="{{route('perfiles.show',['perfil' => $receta->User->id])}}">
                         {{$receta->User->Receta[0]->Like }}
                </a>
            </p>
             <p>{{count($receta->Like)}} Les gusto</p>
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

            <div class="justify-content-center row text-center">
                <div class="btn btn-light">
                    <img src="https://i.pinimg.com/originals/37/9f/00/379f00ceb97d6a0b0672933022755b3a.png" width="30px">
                </div>
            </div>

    </article>

@endsection
