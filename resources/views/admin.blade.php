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
            <a href="admin" class="hover:text-violet-400 transition">Administrador</a>
        </div>
    </nav>

    {{-- CONTEÚDO --}}
    <div class="flex pt-16">

        {{-- SIDEBAR --}}
        <aside class="w-52 min-h-screen bg-slate-900 border-r border-slate-700 p-6 fixed top-16 left-0">
            <h2 class="text-slate-400 text-xs uppercase tracking-widest mb-4">Gêneros</h2>
            <ul class="flex flex-col gap-2">
                @foreach($generos as $genero)
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
            @foreach ($filmes as $filme)
                <div class="bg-slate-900 border border-slate-700 rounded-xl flex gap-6 p-4 hover:border-violet-500 transition cursor-pointer">
                    {{-- IMAGEM PLACEHOLDER --}}
                    <div class="w-28 h-40 bg-slate-700 rounded-lg flex-shrink-0 flex items-center justify-center text-slate-500 text-xs">
                        Poster
                    </div>
                    {{-- INFOS --}}
                    <div class="flex flex-col justify-center gap-2">
                        <h2 class="text-white font-bold text-lg">{{ $filme->titulo }}</h2>
                        
                        <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs transition">
                                Excluir
                            </button>
                        </form>
                        <div class="flex gap-3 text-xs">
                            <div class="flex gap-2 flex-wrap">
                                @foreach ($filme->generos as $genero)
                                    <span class="bg-violet-800 text-violet-200 px-2 py-1 rounded">{{ $genero->genero }}</span>
                                @endforeach
                            </div>
                            <span class="text-slate-400">⏱ {{ $filme->duracao }}</span>
                        </div>
                        <p class="text-slate-400 text-sm max-w-xl">{{ $filme->sinopse }}</p>
                    </div>

                </div>
            @endforeach

        </main>
    </div>

</body>
</html>