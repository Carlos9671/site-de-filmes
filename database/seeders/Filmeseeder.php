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
                'sinopse' => 'As reservas naturais da Terra estão chegando ao fim e um grupo de astronautas recebe a missão de verificar possíveis planetas para receberem a população mundial, possibilitando a continuação da espécie. Cooper é chamado para liderar o grupo e aceita a missão sabendo que pode nunca mais ver os filhos. Ao lado de Brand, Jenkins e Doyle, ele seguirá em busca de um novo lar.',
                'duracao' => '2h 49min',
                'ano_lancamento' => 2014,
                'poster' => 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
                'generos' => ['Ficção Científica', 'Drama', 'Aventura']
            ],

            [
                'titulo' => 'Batman: O Cavaleiro das Trevas',
                'sinopse' => 'Após dois anos desde o surgimento do Batman, os criminosos de Gotham City têm muito o que temer. Com a ajuda do tenente James Gordon e do promotor público Harvey Dent, Batman luta contra o crime organizado. Acuados com o combate, os chefes do crime aceitam a proposta feita pelo Coringa e o contratam para combater o Homem-Morcego.',
                'duracao' => '2h 32min',
                'ano_lancamento' => 2008,
                'poster' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
                'generos' => ['Ação', 'Crime', 'Drama']
            ],

            [
                'titulo' => 'Vingadores: Ultimato',
                'sinopse' => 'Após os eventos devastadores de "Vingadores: Guerra Infinita", o universo está em ruínas devido aos esforços do Titã Louco, Thanos. Com a ajuda de aliados remanescentes, os Vingadores devem se reunir mais uma vez a fim de desfazer as ações de Thanos e restaurar a ordem no universo de uma vez por todas, não importando as consequências.',
                'duracao' => '3h 01min',
                'ano_lancamento' => 2019,
                'poster' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
                'generos' => ['Ação', 'Aventura', 'Ficção Científica']
            ],

            [
                'titulo' => 'Titanic',
                'sinopse' => 'Um artista pobre e uma jovem rica se conhecem e se apaixonam na fatídica jornada do Titanic, em 1912. Embora esteja noiva do arrogante herdeiro de uma siderúrgica, a jovem desafia sua família e amigos em busca do verdadeiro amor.',
                'duracao' => '3h 14min',
                'ano_lancamento' => 1997,
                'poster' => 'https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg',
                'generos' => ['Romance', 'Drama']
            ],

            [
                'titulo' => 'Invocação do Mal',
                'sinopse' => 'Harrisville, Rhode Island, Estados Unidos, 1968. Os investigadores paranormais Ed e Lorraine Warren trabalham para ajudar uma família aterrorizada por uma presença sombria em sua fazenda. Forçados a confrontar uma entidade poderosa, os Warrens se vêem presos no caso mais aterrorizante de suas vidas. Baseado numa história real.',
                'duracao' => '1h 52min',
                'ano_lancamento' => 2013,
                'poster' => 'https://image.tmdb.org/t/p/original/otILeHmcY6wc64DNXi0T7YYATZK.jpg',
                'generos' => ['Terror', 'Suspense']
            ],

            [
                'titulo' => 'Shrek',
                'sinopse' => 'Em um pântano distante vive Shrek, um ogro solitário que vê, sem mais nem menos, sua vida ser invadida por uma série de personagens de contos de fada, como três ratos cegos, um grande e malvado lobo e ainda três porcos que não têm um lugar onde morar. Todos eles foram expulsos de seus lares pelo maligno Lorde Farquaad. Determinado a recuperar a tranquilidade de antes, Shrek resolve encontrar Farquaad e com ele faz um acordo: todos os personagens poderão retornar aos seus lares se ele e seu amigo Burro resgatarem uma bela princesa, que é prisioneira de um dragão. Porém, quando Shrek e o Burro enfim conseguem resgatar a princesa logo eles descobrem que seus problemas estão apenas começando.',
                'duracao' => '1h 30min',
                'ano_lancamento' => 2001,
                'poster' => 'https://image.tmdb.org/t/p/w500/iB64vpL3dIObOtMZgX3RqdVdQDc.jpg',
                'generos' => ['Comédia', 'Aventura', 'Fantasia']
            ],

            [
                'titulo' => 'John Wick',
                'sinopse' => 'John Wick é um lendário assassino de aluguel aposentado, lidando com o luto após perder o grande amor de sua vida. Quando um gângster invade sua casa, mata seu cachorro e rouba seu carro, ele é forçado a voltar à ativa e inicia sua vingança.',
                'duracao' => '1h 41min',
                'ano_lancamento' => 2014,
                'poster' => 'https://image.tmdb.org/t/p/w500/fZPSd91yGE9fCcCe6OoQr6E3Bev.jpg',
                'generos' => ['Ação', 'Crime', 'Suspense']
            ],

            [
                'titulo' => 'Toy Story',
                'sinopse' => 'Buzz Lightyear é o novo e sofisticado astronauta de brinquedo do garoto Andy. Buzz não imaginava que encontraria um rival: Woody, um cowboy de brinquedo que, dominado pelo ciúme, acredita ter perdido um lugar precioso no coração do seu dono. Os dois brinquedos vivem brigando até que vão parar nas garras do vizinho, um verdadeiro destruidor de brinquedos. Agora, mais do que nunca, Buzz e Woody precisam precisam se unir para escapar do perigo. Com a ajuda de seus amigos da caixa de brinquedos, eles vão viver uma incrível aventura.',
                'duracao' => '1h 21min',
                'ano_lancamento' => 1995,
                'poster' => 'https://image.tmdb.org/t/p/w500/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg',
                'generos' => ['Animação', 'Comédia', 'Aventura']
            ],

            [
                'titulo' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'sinopse' => 'Em uma terra fantástica e única, um hobbit recebe de presente de seu tio um anel mágico e maligno que precisa ser destruído antes que caia nas mãos do mal. Para isso, o hobbit Frodo tem um caminho árduo pela frente, onde encontra perigo, medo e seres bizarros. Ao seu lado para o cumprimento desta jornada, ele aos poucos pode contar com outros hobbits, um elfo, um anão, dois humanos e um mago, totalizando nove pessoas que formam a Sociedade do Anel.',
                'duracao' => '2h 58min',
                'ano_lancamento' => 2001,
                'poster' => 'https://image.tmdb.org/t/p/w500/6oom5QYQ2yQTMJIbnvbkBL9cHo6.jpg',
                'generos' => ['Fantasia', 'Aventura', 'Ação']
            ],

            [
                'titulo' => '1917',
                'sinopse' => 'Os cabos Schofield e Blake são jovens soldados britânicos durante a Primeira Guerra Mundial. Quando eles são encarregados de uma missão aparentemente impossível, os dois precisam atravessar território inimigo, lutando contra o tempo, para entregar uma mensagem que pode salvar cerca de 1600 colegas de batalhão.',
                'duracao' => '1h 59min',
                'ano_lancamento' => 2019,
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
                    'ano_lancamento' => $item['ano_lancamento'],
                    'poster' => $item['poster'],
                ]
            );

            $ids = Genero::whereIn('genero', $item['generos'])->pluck('id');

            $filme->generos()->sync($ids);
        }
    }
}
