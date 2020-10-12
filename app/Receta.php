<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Save data
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes','imagen','categoria_id',
    ];

    public function Categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    //obtiene la info del user via fk
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Like()
    {
        return$this->hasMany(Like::class);
    }

}
