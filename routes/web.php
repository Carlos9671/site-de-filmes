<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cadastro');
});

Route::get('/filmes', function () {
    return view('filmes');
});