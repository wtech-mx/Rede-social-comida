<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function __invoke(Request $request){

        $recetas = [
            'Receta pizza',
            'Redceta hamburge'
        ];

        $categorias = [
            'comida arf',
            'comida mexa',
        ];

        return view('recetas.index',compact('recetas','categorias'));
    }
}
