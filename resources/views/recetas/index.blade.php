@extends('layouts.app')

@section('botones')

    <a href="{{  route('recetas.create') }}" class="btn btn-success text-white">Crear Receta</a>
    <a href="{{  route('perfiles.edit',['perfil'=>$usuario->id]) }}" class="btn btn-info text-white">Editar perfil</a>
    <a href="{{  route('perfiles.show',['perfil'=>$usuario->id]) }}" class="btn btn-dark text-white">Ver perfil</a>

@endsection

@section('content')

    <h1 class="text-center mb-5">Administra tus recetas</h1>
    <div class="col-md-10 mx-auto bg-white p3">
        <table class="table">
            <thead class="bg-danger text-ligth">
                <tr class="text-white">
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td> {{$receta->titulo}} </td>
                        <td>  {{$receta->categoria->nombre}} </td>
                        <td>

                            <form action="{{ route('recetas.destroy',['receta' => $receta->id])}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModalCenter">
                                  Eliminar &times;
                                </button>

                                @include('recetas.modal')

                                <a href="{{route('recetas.edit',['receta' => $receta->id])}}" class="btn btn-sm btn-dark mr-1">Editar</a>
                                <a href="{{route('recetas.show',['receta' => $receta->id])}}" class="btn btn-sm btn-info mr-1">Ver</a>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
