<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filme;
use App\Models\Genero;

class Filmeseeder extends Seeder
{
    /**
     * popular o banco de dados de filmes.
     */
public function run(): void
    {
        $filmes = [
            [
                'titulo' => 'Interestelar',
                'sinopse' => 'Em um futuro devastado, astronautas viajam por um buraco de minhoca em busca de um novo lar.',
                'duracao' => '2h 49min',
                'poster' => 'interestelar.jpg',
                'generos' => ['Ficção Científica', 'Drama', 'Aventura']
            ],

            [
                'titulo' => 'Batman: O Cavaleiro das Trevas',
                'sinopse' => 'Batman enfrenta o Coringa em Gotham.',
                'duracao' => '2h 32min',
                'poster' => 'batman.jpg',
                'generos' => ['Ação', 'Crime', 'Drama']
            ],

            [
                'titulo' => 'Vingadores: Ultimato',
                'sinopse' => 'Heróis se unem para derrotar Thanos.',
                'duracao' => '3h 01min',
                'poster' => 'ultimato.jpg',
                'generos' => ['Ação', 'Aventura', 'Ficção Científica']
            ],

            [
                'titulo' => 'Titanic',
                'sinopse' => 'Um romance a bordo do Titanic.',
                'duracao' => '3h 14min',
                'poster' => 'titanic.jpg',
                'generos' => ['Romance', 'Drama']
            ],

            [
                'titulo' => 'Invocação do Mal',
                'sinopse' => 'Investigadores enfrentam forças malignas.',
                'duracao' => '1h 52min',
                'poster' => 'invocacao.jpg',
                'generos' => ['Terror', 'Suspense']
            ],

            [
                'titulo' => 'Shrek',
                'sinopse' => 'Um ogro vive uma grande aventura.',
                'duracao' => '1h 30min',
                'poster' => 'shrek.jpg',
                'generos' => ['Comédia', 'Aventura', 'Fantasia']
            ],

            [
                'titulo' => 'John Wick',
                'sinopse' => 'Um assassino busca vingança.',
                'duracao' => '1h 41min',
                'poster' => 'johnwick.jpg',
                'generos' => ['Ação', 'Crime', 'Suspense']
            ],

            [
                'titulo' => 'Toy Story',
                'sinopse' => 'Brinquedos ganham vida.',
                'duracao' => '1h 21min',
                'poster' => 'toystory.jpg',
                'generos' => ['Animação', 'Comédia', 'Aventura']
            ],

            [
                'titulo' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'sinopse' => 'Um hobbit deve destruir um anel poderoso.',
                'duracao' => '2h 58min',
                'poster' => 'lotr1.jpg',
                'generos' => ['Fantasia', 'Aventura', 'Ação']
            ],

            [
                'titulo' => '1917',
                'sinopse' => 'Soldados atravessam território inimigo na guerra.',
                'duracao' => '1h 59min',
                'poster' => '1917.jpg',
                'generos' => ['Guerra', 'Drama']
            ],
        ];

        foreach ($filmes as $item) {

            $filme = Filme::create([
                'titulo' => $item['titulo'],
                'sinopse' => $item['sinopse'],
                'duracao' => $item['duracao'],
                'poster' => $item['poster'],
            ]);

            $ids = Genero::whereIn('genero', $item['generos'])->pluck('id');

            $filme->generos()->attach($ids);
        }
    }
}
