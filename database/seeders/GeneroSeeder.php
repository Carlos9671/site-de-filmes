<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * popular meus generos
     */
    public function run(): void 
    {
        $generos = [    //gêneros na tabela generos
            'Ação', 'Aventura', 'Comédia','Drama',
            'Ficção Científica','romance','Animação',
            'Terror','Documentário','Suspense','Crime',
            'Musical','Guerra','Faroeste'
        ];

        foreach ($generos as $genero) { //aqui  é onde cria o registro na tabela
            Genero::firstOrCreate(['genero' => $genero]); 
        }
    }
}
