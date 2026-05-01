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
                'poster' => 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
                'generos' => ['Ficção Científica', 'Drama', 'Aventura']
            ],

            [
                'titulo' => 'Batman: O Cavaleiro das Trevas',
                'sinopse' => 'Batman enfrenta o Coringa em Gotham.',
                'duracao' => '2h 32min',
                'poster' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
                'generos' => ['Ação', 'Crime', 'Drama']
            ],

            [
                'titulo' => 'Vingadores: Ultimato',
                'sinopse' => 'Heróis se unem para derrotar Thanos.',
                'duracao' => '3h 01min',
                'poster' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
                'generos' => ['Ação', 'Aventura', 'Ficção Científica']
            ],

            [
                'titulo' => 'Titanic',
                'sinopse' => 'Um romance a bordo do Titanic.',
                'duracao' => '3h 14min',
                'poster' => 'https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg',
                'generos' => ['Romance', 'Drama']
            ],

            [
                'titulo' => 'Invocação do Mal',
                'sinopse' => 'Investigadores enfrentam forças malignas.',
                'duracao' => '1h 52min',
                'poster' => 'https://image.tmdb.org/t/p/original/otILeHmcY6wc64DNXi0T7YYATZK.jpg',
                'generos' => ['Terror', 'Suspense']
            ],

            [
                'titulo' => 'Shrek',
                'sinopse' => 'Um ogro vive uma grande aventura.',
                'duracao' => '1h 30min',
                'poster' => 'https://image.tmdb.org/t/p/w500/iB64vpL3dIObOtMZgX3RqdVdQDc.jpg',
                'generos' => ['Comédia', 'Aventura', 'Fantasia']
            ],

            [
                'titulo' => 'John Wick',
                'sinopse' => 'Um assassino busca vingança.',
                'duracao' => '1h 41min',
                'poster' => 'https://image.tmdb.org/t/p/w500/fZPSd91yGE9fCcCe6OoQr6E3Bev.jpg',
                'generos' => ['Ação', 'Crime', 'Suspense']
            ],

            [
                'titulo' => 'Toy Story',
                'sinopse' => 'Brinquedos ganham vida.',
                'duracao' => '1h 21min',
                'poster' => 'https://image.tmdb.org/t/p/w500/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg',
                'generos' => ['Animação', 'Comédia', 'Aventura']
            ],

            [
                'titulo' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'sinopse' => 'Um hobbit deve destruir um anel poderoso.',
                'duracao' => '2h 58min',
                'poster' => 'https://image.tmdb.org/t/p/w500/6oom5QYQ2yQTMJIbnvbkBL9cHo6.jpg',
                'generos' => ['Fantasia', 'Aventura', 'Ação']
            ],

            [
                'titulo' => '1917',
                'sinopse' => 'Soldados atravessam território inimigo na guerra.',
                'duracao' => '1h 59min',
                'poster' => 'https://image.tmdb.org/t/p/original/iZf0KyrE25z1sage4SYFLCCrMi9.jpg',
                'generos' => ['Guerra', 'Drama']
            ],
        ];

        foreach ($filmes as $item) {

            $filme = Filme::updateOrCreate(
                ['titulo' => $item['titulo']],
                [
                    'sinopse' => $item['sinopse'],
                    'duracao' => $item['duracao'],
                    'poster' => $item['poster'],
                ]
            );

            $ids = Genero::whereIn('genero', $item['generos'])->pluck('id');

            $filme->generos()->sync($ids);
        }
    }
}
