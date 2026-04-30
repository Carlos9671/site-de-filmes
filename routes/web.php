<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Models\Filme;
use App\Models\Genero;

// inicia na tela de cadastro
Route::get('/', function () {
    return view('cadastro');
});

// pega a tela admin com filmes e generos
Route::get('/admin', function () {
    $filmes = Filme::with('generos')->get();
    $generos = Genero::pluck('genero');

    return view('admin', compact('filmes', 'generos'));
});


//  forma extremamente simples de fazer um CRUD, automatiza todas as fases para mim
Route::resource('filmes', FilmeController::class);