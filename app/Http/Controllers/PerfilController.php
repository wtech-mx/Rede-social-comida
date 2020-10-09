<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function show(Perfil $perfil)
    {
        return view('perfiles.show',compact('perfil'));
    }

    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit',compact('perfil'));
    }

    public function update(Request $request ,Perfil $perfil)
    {
        // validación
        $data = $request->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required',
        ]);

        if (request('imagen')){
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            //asignacion de OBJ
            $array_imagen = ['imagen' => $ruta_imagen];
        }

         auth()->user()->url =  $data['url'];
         auth()->user()->name =  $data['nombre'];
         auth()->user()->save();

        unset($data['url']);
        unset($data['nombre']);

        auth()->user()->Perfil()->update( array_merge(
            $data ,
            $array_imagen ?? []
        ));

        return redirect()->action('RecetaController@index');
    }

}
