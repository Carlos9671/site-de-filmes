<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVault - Filmes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-950 text-white min-h-screen" x-data="{ generoAtivo: 'Todos' }">

    {{-- NAVBAR --}}
    <nav class="bg-slate-900 border-b border-slate-700 px-8 py-4 flex items-center justify-between fixed top-0 left-0 right-0 z-10">
        <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 CineVault</span>
        <div class="flex items-center gap-6 text-sm text-slate-300">
            <a href="#" class="hover:text-violet-400 transition">Início</a>
            <a href="#" class="hover:text-violet-400 transition">Buscar</a>
            <a href="#" class="hover:text-violet-400 transition">Favoritos</a>
            <a href="#" class="hover:text-violet-400 transition">Minha Conta</a>
        </div>
    </nav>

    {{-- CONTEÚDO --}}
    <div class="flex pt-16">

        {{-- SIDEBAR --}}
        <aside class="w-52 min-h-screen bg-slate-900 border-r border-slate-700 p-6 fixed top-16 left-0">
            <h2 class="text-slate-400 text-xs uppercase tracking-widest mb-4">Gêneros</h2>
            <ul class="flex flex-col gap-2">
                @foreach(['Todos', 'Ação', 'Comédia', 'Drama', 'Terror', 'Ficção Científica', 'Romance', 'Animação', 'Documentário'] as $genero)
                    <li>
                        <button
                            @click="generoAtivo = '{{ $genero }}'"
                            :class="generoAtivo === '{{ $genero }}' ? 'bg-violet-700 text-white' : 'text-slate-400 hover:text-white'"
                            class="w-full text-left px-3 py-2 rounded-lg text-sm transition">
                            {{ $genero }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </aside>

        {{-- LISTA DE FILMES --}}
        <main class="ml-52 flex-1 p-8 flex flex-col gap-4">

            <h1 class="text-lg font-semibold text-slate-300 mb-2">
                Exibindo: <span class="text-violet-400" x-text="generoAtivo"></span>
            </h1>

            {{-- CARD FILME --}}
            @foreach([
                ['titulo' => 'Interestelar', 'genero' => 'Ficção Científica', 'duracao' => '2h 49min', 'sinopse' => 'Um grupo de astronautas viaja por um buraco de minhoca em busca de um novo lar para a humanidade.'],
                ['titulo' => 'O Poderoso Chefão', 'genero' => 'Drama', 'duracao' => '2h 55min', 'sinopse' => 'A saga da família Corleone, uma das mais poderosas famílias da máfia americana.'],
                ['titulo' => 'Coringa', 'genero' => 'Drama', 'duracao' => '2h 02min', 'sinopse' => 'A origem do Coringa, um comediante fracassado que mergulha na loucura em Gotham City.'],
                ['titulo' => 'Vingadores: Ultimato', 'genero' => 'Ação', 'duracao' => '3h 01min', 'sinopse' => 'Os heróis remanescentes tentam reverter o estrago causado por Thanos de uma vez por todas.'],
            ] as $filme)
                <div class="bg-slate-900 border border-slate-700 rounded-xl flex gap-6 p-4 hover:border-violet-500 transition cursor-pointer">
                    {{-- IMAGEM PLACEHOLDER --}}
                    <div class="w-28 h-40 bg-slate-700 rounded-lg flex-shrink-0 flex items-center justify-center text-slate-500 text-xs">
                        Poster
                    </div>
                    {{-- INFOS --}}
                    <div class="flex flex-col justify-center gap-2">
                        <h2 class="text-white font-bold text-lg">{{ $filme['titulo'] }}</h2>
                        <div class="flex gap-3 text-xs">
                            <span class="bg-violet-800 text-violet-200 px-2 py-1 rounded">{{ $filme['genero'] }}</span>
                            <span class="text-slate-400">⏱ {{ $filme['duracao'] }}</span>
                        </div>
                        <p class="text-slate-400 text-sm max-w-xl">{{ $filme['sinopse'] }}</p>
                    </div>
                </div>
            @endforeach

        </main>
    </div>

</body>
</html>