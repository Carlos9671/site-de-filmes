<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCine - Filmes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-950 text-white min-h-screen" x-data="{ buscarAberto: false, sidebarAberta: false }">

    {{-- NAVBAR + BUSCA --}}
    <div class="fixed top-0 left-0 right-0 z-10" x-data="{ menuAberto: false }">

        <nav class="bg-slate-900 border-b border-slate-700 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                {{-- BOTÃO GÊNEROS NO MOBILE --}}
                <button @click="sidebarAberta = !sidebarAberta" class="md:hidden text-slate-300 hover:text-violet-400 transition text-xs border border-slate-600 px-2 py-1 rounded">
                    Gêneros
                </button>
                <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 MyCine</span>
            </div>

            {{-- LINKS NO DESKTOP --}}
            <div class="hidden md:flex items-center gap-6 text-sm text-slate-300">
                <a href="#" class="hover:text-violet-400 transition">Início</a>
                <button @click="buscarAberto = !buscarAberto" class="hover:text-violet-400 transition">Buscar</button>
                <a href="cadastro" class="hover:text-violet-400 transition">Administrador</a>
            </div>

            {{-- BOTÃO HAMBURGUER NO MOBILE --}}
            <button @click="menuAberto = !menuAberto" class="md:hidden text-slate-300 hover:text-violet-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!menuAberto" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="menuAberto" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </nav>

        {{-- MENU MOBILE --}}
        <div x-show="menuAberto" class="md:hidden bg-slate-900 border-b border-slate-700 px-6 py-4 flex flex-col gap-4 text-sm text-slate-300">
            <a href="#" class="hover:text-violet-400 transition">Início</a>
            <button @click="buscarAberto = !buscarAberto; menuAberto = false" class="text-left hover:text-violet-400 transition">Buscar</button>
            <a href="cadastro" class="hover:text-violet-400 transition">Administrador</a>
        </div>

        {{-- BARRA DE BUSCA --}}
        <div x-show="buscarAberto" class="bg-slate-900 border-b border-slate-700 px-6 py-3">
            <form action="/filmes" method="GET" class="flex gap-3">
                <input type="text" name="busca" placeholder="Buscar filme..."
                    class="flex-1 bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
                <button type="submit" class="bg-violet-700 hover:bg-violet-600 text-white px-6 py-2 rounded-lg transition">
                    Buscar
                </button>
            </form>
        </div>
    </div>

    {{-- SIDEBAR MOBILE (dropdown) --}}
    <div x-show="sidebarAberta" class="md:hidden fixed top-16 left-0 right-0 z-20 bg-slate-900 border-b border-slate-700 px-6 py-4">
        <ul class="flex flex-wrap gap-2">
            <li>
                @php $classTodos = $generoAtivo === 'Todos' ? 'bg-violet-700 text-white' : 'text-slate-400 hover:text-white border border-slate-600'; @endphp
                <a href="/filmes" @click="sidebarAberta = false" class="block px-3 py-1 rounded-full text-sm transition {{ $classTodos }}">
                    Todos
                </a>
            </li>
            @foreach($generos as $genero)
                @php $classGenero = $generoAtivo === $genero->genero ? 'bg-violet-700 text-white' : 'text-slate-400 hover:text-white border border-slate-600'; @endphp
                <li>
                    <a href="/filmes?genero={{ urlencode($genero->genero) }}" @click="sidebarAberta = false" class="block px-3 py-1 rounded-full text-sm transition {{ $classGenero }}">
                        {{ $genero->genero }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- CONTEÚDO --}}
    <div class="flex pt-16">

        {{-- SIDEBAR DESKTOP --}}
        <aside class="hidden md:block w-52 min-h-screen bg-slate-900 border-r border-slate-700 p-6 fixed top-16 left-0">
            <h2 class="text-slate-400 text-xs uppercase tracking-widest mb-4">Gêneros</h2>
            <ul class="flex flex-col gap-2">
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
        <main class="w-full md:ml-52 flex-1 p-4 md:p-8 flex flex-col gap-4">

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="bg-green-600 text-white px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-lg font-semibold text-slate-300 mb-2">
                Exibindo: <span class="text-violet-400">{{ $generoAtivo }}</span>
            </h1>

            {{-- CARD FILME --}}
            @foreach ($filmes as $filme)
                <a href="{{ route('filmes.show', $filme->id) }}" class="block">
                <div class="bg-slate-900 border border-slate-700 rounded-xl flex flex-col md:flex-row gap-4 p-4 hover:border-violet-500 transition cursor-pointer">
                    {{-- POSTER --}}
                    <img src="{{ $filme->poster }}"
                        class="w-full md:w-28 h-48 md:h-40 object-cover rounded-lg"
                        alt="Poster do filme">
                    {{-- INFOS --}}
                    <div class="flex flex-col justify-center gap-2">
                        <h2 class="text-white font-bold text-lg">{{ $filme->titulo }}</h2>
                        <div class="flex flex-wrap gap-2 text-xs">
                            @foreach ($filme->generos as $genero)
                                <span class="bg-violet-800 text-violet-200 px-2 py-1 rounded">{{ $genero->genero }}</span>
                            @endforeach
                            <span class="text-slate-400">⏱ {{ $filme->duracao }}</span>
                        </div>
                        <p class="text-slate-400 text-sm">{{ Str::limit($filme->sinopse, 120) }}</p>
                    </div>
                </div>
                </a>
            @endforeach

        </main>
    </div>

</body>
</html>