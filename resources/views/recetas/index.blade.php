@extends('layouts.app')

@section('botones')

    <a href="{{  route('recetas.create') }}" class="btn btn-success text-white">Crear Receta</a>

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
                            <a href="" class="btn btn-danger mr-1">Eliminar</a>
                            <a href="" class="btn btn-dark mr-1">Editar</a>
                            <a href="" class="btn btn-info mr-1">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
