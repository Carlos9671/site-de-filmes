<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;


class FilmeController extends Controller
{
    /**
     * Lista todos os filmes e ggeneros no front
     */
    public function index(Request $request)     //recebe dados do http
    {
        $generos = Genero::all();   // busca todos os generos
        $generoAtivo = $request->query('genero', 'Todos');   //Avalia o genero na URL

        if ($generoAtivo === 'Todos') {
            $filmes = Filme::with('generos')->get();    //Busca todos os generos
        } else {
            $filmes = Filme::with('generos')    //Busca somente o gênero selecionado
                ->whereHas('generos', function ($query) use ($generoAtivo) {   
                    $query->where('genero', $generoAtivo);
                })->get();
        }

        return view('filmes', compact('filmes', 'generos', 'generoAtivo'));
    }

    /**
     * exibe formulario de cadastro
     */
    public function create()
    {
        $generos = Genero::all();
        return view('adicionar', compact('generos'));
    }

    /**
     * Salva o filme no banco
     */
    public function store(Request $request)
    {

       $request->validate([     // diminui os riscos de informações erradas em campos errados
            'titulo' => 'required|string|max:255',
            'sinopse' => 'required',
            'duracao' => 'required',
            'poster' => 'nullable|url',
            'generos' => 'required|array|min:1'
        ]);

        $filme = Filme::create([    // cria o filme
            'titulo' => $request->titulo,
            'sinopse' => $request->sinopse,
            'duracao' => $request->duracao,
            'poster' => $request->poster,
        ]);

        $filme->generos()->sync($request->generos);

        return redirect('/admin')->with('success', 'Filme criado com sucesso!');
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
        $filme = Filme::with('generos')->findOrFail($id);
        $generos = Genero::all();

        return view('editar', compact('filme','generos'));
    }

    /**
     * Salva a edição no banco
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopse' => 'required',
            'duracao' => 'required',
            'poster' => 'nullable|url',
            'generos' => 'required|array|min:1'
        ]);
        $filme = Filme::findOrFail($id);

        $filme->update([    // atualiza os dados do filme
            'titulo' => $request->titulo,
            'sinopse' => $request->sinopse,
            'duracao' => $request->duracao,
            'poster' => $request->poster,
        ]);

        $filme->generos()->sync($request->generos); // Atualiza os generos


        return redirect('/admin')->with('success','Seu filme foi editado com sucesso');
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
