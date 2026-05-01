<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = ['genero']; //fillable protege o conteudo contra dados extras

    public function filmes()
    {
        return $this->belongsToMany(Filme::class, 'filme_genero'); // muitos para muitos, filmes para generos de filmes
    }
}
