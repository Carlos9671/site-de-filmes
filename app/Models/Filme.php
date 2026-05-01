<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = [ //fillable protege tudo contra mal intencionado
        'titulo',
        'sinopse',
        'duracao',
        'ano_lancamento',
        'poster',
    ];

    public function generos()   //muitos para muitos, um filme relaciona com vários gêneros
    {
        return $this->belongsToMany(Genero::class, 'filme_genero');
    }
}
