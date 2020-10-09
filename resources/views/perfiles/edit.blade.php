@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection


@section('botones')

    <a href="{{ route('recetas.index')  }}" class="btn btn-success text-white">Volver</a>

@endsection

@section('content')

    <h1 class="text-center">Editar mi perfil </h1>

    <div class="row justify-content-center">
        <div class="col-md-10 bg-white p-3">
            <form action="{{route('perfiles.update',['perfil' => $perfil->id])}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="nombre">Nombre</label>
                    <input type="text"
                           class="form-control @error('nombre') is-invalid @enderror"
                           name="nombre"
                           id="nombre"
                           placeholder="nombre"
                          value="{{$perfil->usuario->name}}"
                    >

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="url">Sitio Web</label>
                    <input type="text"
                           class="form-control @error('url') is-invalid @enderror"
                           name="url"
                           id="url"
                           placeholder="Sitio Web"
                           value="{{$perfil->usuario->url}}"
                    >

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group mt-3">

                    <label for="biografia">Biografia</label>
                    <input type="hidden"
                           id="biografia"
                           name="biografia"
                           value="{{$perfil->biografia}}"
                    >
                    <trix-editor input="biografia"  class="form-control @error('biografia') is-invalid @enderror"></trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group mt-3">

                    <label for="imagen">Tu Imagen</label>
                    <input type="file"
                            id="imagen"
                           class="form-control @error('imagen') is-invalid @enderror"
                           name="imagen"
                    >

                    @if($perfil->imagen)
                        <div class="mt-4">
                            <p>Imagen actual</p>
                            <img src="/storage/{{$perfil->imagen}}" style="width: 300px">
                        </div>

                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="ACTUALIZAR PERFIL">
                </div>

            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
@endsection
