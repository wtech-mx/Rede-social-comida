<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller

{
    public function __construct(){
        $this->middleware('auth',['excep' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth::user()->Recetas->dd();

        $categoria = CategoriaReceta::all(['id','nombre']);

        $usuario = Auth::user();
        $recetas = Auth::user()->Recetas;

        return view('recetas.index',compact('recetas','usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('categoria_recetas')->get()->pluck('nombre','id')->dd();

        //Obtener las categorias (sin modelo)
        //$categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id');

        //con Modelo
        $categorias = CategoriaReceta::all(['id','nombre']);

        return view('recetas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
        ]);

        // obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

//        DB::table('recetas')->insert([
//            'titulo' => $data['titulo'],
//            'preparacion' => $data['preparacion'],
//            'ingredientes' => $data['ingredientes'],
//            'imagen' => $ruta_imagen,
//            'user_id' => Auth::user()->id,
//            'categoria_id' => $data['categoria'],
//        ]);

        // Almacenar en Db con Model

        auth()->user()->Recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria'],
        ]);

        return redirect()->action('RecetaController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show',compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $categorias = CategoriaReceta::all(['id','nombre']);
        return view('recetas.edit',compact('categorias','receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //Revisar el policy

        $this->authorize('update',$receta);

        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        if (request('imagen')){
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();

            //asignacion de OBJ
            $receta->imagen = $ruta_imagen;
        }

        $receta->titulo = $data['titulo'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->categoria_id = $data['categoria'];

        $receta->save();

        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //ejecutar el policy
        $this->authorize('delete',$receta);

        $receta->delete();

        return redirect()->action('RecetaController@index');
    }
}
