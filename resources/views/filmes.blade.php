<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCine - Filmes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>


<body class="bg-slate-950 text-white min-h-screen" x-data="{ buscarAberto: false }">

    {{-- NAVBAR + BUSCA --}}
    <div class="fixed top-0 left-0 right-0 z-10">

        <nav class="bg-slate-900 border-b border-slate-700 px-8 py-4 flex items-center justify-between">
            <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 MyCine</span>
            <div class="flex items-center gap-6 text-sm text-slate-300">
                <a href="#" class="hover:text-violet-400 transition">Início</a>
                <button @click="buscarAberto = !buscarAberto" class="hover:text-violet-400 transition">Buscar</button>
                <a href="cadastro" class="hover:text-violet-400 transition">Administrador</a>
            </div>
        </nav>

        {{-- BARRA DE BUSCA --}}
        <div x-show="buscarAberto" class="bg-slate-900 border-b border-slate-700 px-8 py-3">
            <form action="/filmes" method="GET" class="flex gap-3">
                <input type="text" name="busca" placeholder="Buscar filme..."
                    class="flex-1 bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
                <button type="submit" class="bg-violet-700 hover:bg-violet-600 text-white px-6 py-2 rounded-lg transition">
                    Buscar
                </button>
            </form>
        </div>

    </div>

    {{-- CONTEÚDO --}}
    <div class="flex pt-16">

        {{-- SIDEBAR --}}
        <aside class="w-52 min-h-screen bg-slate-900 border-r border-slate-700 p-6 fixed top-16 left-0">
            <h2 class="text-slate-400 text-xs uppercase tracking-widest mb-4">Gêneros</h2>
            <ul class="flex flex-col gap-2">
            {{-- Todos --}}
            <li>
                @php $classTodos = $generoAtivo === 'Todos' ? 'bg-violet-700 text-white' : 'text-slate-400 hover:text-white'; @endphp
                <a href="/filmes" class="block w-full text-left px-3 py-2 rounded-lg text-sm transition {{ $classTodos }}">
                    Todos
                </a>
            </li>

            @foreach($generos as $genero)
                @php $classGenero = $generoAtivo === $genero->genero ? 'bg-violet-700 text-white' : 'text-slate-400 hover:text-white'; @endphp
                <li>
                    <a href="/filmes?genero={{ urlencode($genero->genero) }}" class="block w-full text-left px-3 py-2 rounded-lg text-sm transition {{ $classGenero }}">
                        {{ $genero->genero }}
                    </a>
                </li>
            @endforeach
            </ul>
        </aside>

        {{-- LISTA DE FILMES --}}
        <main class="ml-52 flex-1 p-8 flex flex-col gap-4">
        {{-- MENSAGEM DE SUCESSO --}}
        @if(session('success'))
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 3000)"
                class="bg-green-600 text-white px-4 py-2 rounded mb-4">

                {{ session('success') }}

            </div>
        @endif
            <h1 class="text-lg font-semibold text-slate-300 mb-2">
                Exibindo: <span class="text-violet-400">{{ $generoAtivo }}</span>
            </h1>

            {{-- CARD FILME --}} 

            @foreach ($filmes as $filme)
            

                <div class="bg-slate-900 border border-slate-700 rounded-xl flex gap-6 p-4 hover:border-violet-500 transition cursor-pointer">
                    {{-- IMAGEM PLACEHOLDER --}}
                    <img src="{{ $filme->poster }}" 
                        class="w-28 h-40 object-cover rounded-lg"
                        alt="Poster do filme">
                    {{-- INFOS --}}
                    <div class="flex flex-col justify-center gap-2">
                        <h2 class="text-white font-bold text-lg">{{ $filme->titulo }}</h2>
                        <div class="flex gap-3 text-xs">
                            <div class="flex gap-2 flex-wrap">
                                @foreach ($filme->generos as $genero)
                                    <span class="bg-violet-800 text-violet-200 px-2 py-1 rounded">{{ $genero->genero }}</span>
                                @endforeach
                            </div>
                            <span class="text-slate-400">⏱ {{ $filme->duracao }}</span>
                            <span class="text-slate-400">{{ $filme->ano_lancamento }}</span>
                        </div>
                        <p class="text-slate-400 text-sm max-w-xl">{{ Str::limit($filme->sinopse, 120) }}</p>
                    </div>
                </div>
            @endforeach

        </main>
    </div>

</body>
</html>
