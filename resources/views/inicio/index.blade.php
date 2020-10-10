@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
@endsection


@section('hero')
    <div class="hero-categorias">
        <form class="container h-100" action={{ route('buscar.show') }}>
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra una receta para tu próxima comida</p>

                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar Receta"
                    />
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')

    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">  Ultimas recetas   </h2>

    <div class="container nuevas-recetas">
        <div class="titulo-categoria text-uppercase mt-5">
            <div class="row">

                @foreach($nuevas as $nueva)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/storage/{{$nueva->imagen}}" class="card-img-top">

                            <div class="card-body">
                                <h3>{{$nueva->titulo}}</h3>

                                <p class="text-muted" style="font-size: 15px"> {{Str::words(strip_tags($nueva->preparacion),10)}}</p>

                                <a href="{{route('recetas.show',['receta'=>$nueva->id])}}" class="btn btn-primary d-block text-uppercase">Ver receta</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4"> Recetas mas votadas</h2>
            <div class="row">
                @foreach($votadas as $receta)
                        @include('ui.receta')
                @endforeach
            </div>
        </div>

    @foreach($recetas as $key => $grupo )
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4"> {{ str_replace('-', ' ',  $key) }} </h2>
            <div class="row">
                @foreach($grupo as $recetas)
                    @foreach($recetas as $receta)
                        @include('ui.receta')
                    @endforeach
                @endforeach
            </div>
        </div>

    @endforeach





@endsection
