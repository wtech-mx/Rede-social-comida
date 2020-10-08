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
                    <th>Categori</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Pizza</td>
                    <td>Pizzas</td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
