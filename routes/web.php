<?php

use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\FilmeController;
use App\Models\Filme;
use App\Models\Genero;

// inicia na tela de filmes
Route::get('/', [FilmeController::class, 'index']);

route::get('/cadastro', function () {
    return view('cadastro');
});

//  forma extremamente simples de fazer um CRUD, automatiza todas as fases para mim
Route::resource('filmes', FilmeController::class);

// igual o de cima soq para o genero
Route::resource('generos', GeneroController::class);

// limitar o acesso a parte de admin
Route::post('/login', function (Illuminate\Http\Request $request) {

    if ($request->usuario === 'admin' && $request->senha === '1234') {
        session(['logado' => true]);
        return redirect('/admin');
    }

    return back()->with('erro', 'Usuário ou senha inválidos');
});


Route::get('/admin', function (Request $request) {

    if (!session('logado')) {
        return redirect('/');
    }

    $generos = Genero::all();
    $generoAtivo = $request->query('genero', 'Todos');
    $busca = $request->query('busca'); 

    $query = Filme::with('generos');

    // filtro por gênero
    if ($generoAtivo !== 'Todos') {
        $query->whereHas('generos', function ($q) use ($generoAtivo) {
            $q->where('genero', $generoAtivo);
        });
    }

    // Filtro de busca (não estava funcionando)
    if ($busca) {
        $query->where('titulo', 'like', '%' . $busca . '%');
    }

    $filmes = $query->get();

    return view('admin', compact('filmes', 'generos', 'generoAtivo', 'busca'));
});
