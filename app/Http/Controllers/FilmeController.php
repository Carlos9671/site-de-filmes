<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class FilmeController extends Controller
{
    /**
     * Lista todos os filmes e ggeneros no front
     */
    public function index()
    {
        $filmes = Filme::with('generos')->get();     //puxa tudo
        $generos = Genero::pluck('genero'); //puxa a coluna genero
        return view("admin", compact("filmes", "generos"));    //retorna os valores pedidos
    }

    /**
     * exibe formulario de cadastro
     */
    public function create()
    {
        //
    }

    /**
     * Salva o filme no banco
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * exibe dtealhes de um filme
     */
    public function show(string $id)
    {
        //
    }

    /**
     * exibe formulário de edição
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Salva a edição no banco
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Deleta o filme
     */
    public function destroy(string $id)
    {
        $filme = Filme::findOrFail($id);

        $filme->delete();

        Return redirect()->back()->with('success', 'Filme deletado com sucesso!');
    }
}
