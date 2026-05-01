<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    /**
     * retorna os generos
     */
    public function index()
    {
        $generos = Genero::all();
        return view("generos.index", compact("generos"));
    }

    /**
     *  exibir o formulário de criar genero
     */
    public function create()
    {
        return view("generos.create");
    }

    /**
     * Criar o genero de fato
     */
    public function store(Request $request)
    {
        $request->validate([
            'genero' => 'required|unique:generos,genero',
        ]);
        Genero::create([
            'genero' => $request->genero]);

        return redirect('/generos')->with('success','Gênero criado com sucesso');
    }

    /**
     * apagar algum genero
     */
    public function destroy(string $id)
    {
        $genero = Genero::findOrFail($id);

        if ($genero->filmes()->count() > 0) {   //se generos for maior que 0 não é possível apagar o gênero
            return redirect('/generos')->with('erro', 'Este gênero possui ' . $genero->filmes()->count() . ' filme(s) vinculado(s) e não pode ser deletado.');
        }

        $genero->delete();
        return redirect('/generos')->with('success','Gênero deletado com sucesso');
    }
}
