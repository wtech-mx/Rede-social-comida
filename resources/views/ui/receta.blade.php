
                        <div class="col-md-4 mt-4">
                            <div class="card shadow">
                                    <img class="card-img-top" src="/storage/{{$receta->imagen}}">

                                    <div class="card-body">
                                        <h3 class="card-title">{{$receta->titulo}}</h3>

                                        <div class="meta-receta d-flex justify-content-between">
                                            @php
                                                $originalDate = $receta->created_at;
                                                $newDate = date("d/m/Y", strtotime($originalDate));
                                            @endphp
                                            {{$newDate}}
                                            <p>{{count($receta->Like)}} Les gusto</p>
                                         </div>
                                            <p  style="font-size: 15px"> {{Str::words(strip_tags($receta->preparacion),20)}}</p>
                                            <a href="{{route('recetas.show',['receta'=>$receta->id])}}" class="btn btn-primary d-block text-uppercase">Ver receta</a>
                                    </div>
                            </div>
                        </div>
