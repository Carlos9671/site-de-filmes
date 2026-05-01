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
     * 
     */
    public function create()
    {
        return view("generos.create");
    }

    /**
     * Criar o genero
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * 
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * 
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * apagar algum genero
     */
    public function destroy(string $id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();
        return redirect('/generos')->with('success','Gênero deletado com sucesso');
    }
}
