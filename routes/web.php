<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use App\Models\Filme;
use App\Models\Genero;

Route::get('/', function () {
    return view('cadastro');       //chama e retorna a tela cadastro
});

Route::get('/filmes', function () {
    return view('filmes');      //chama e retorna a tela filmes
});

Route::get('/admin', function () {

    $filmes = Filme::with('generos')->get();
    $generos = Genero::pluck('genero');

    return view('admin', compact('filmes', 'generos'));
});

route::resource('filmes', FilmeController::class);

Route::delete('/filmes/{id}', [FilmeController::class, 'destroy'])->name('filmes.destroy');