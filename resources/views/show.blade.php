<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCine - {{ $filme->titulo }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white min-h-screen">

    <nav class="bg-slate-900 border-b border-slate-700 px-6 py-4 flex items-center justify-between">
        <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 MyCine</span>
        <a href="/filmes" class="text-slate-400 hover:text-violet-400 text-sm transition">← Voltar</a>
    </nav>

    <div class="max-w-3xl mx-auto py-10 px-6">

        <div class="flex flex-col md:flex-row gap-8">

            {{-- POSTER --}}
            <img src="{{ $filme->poster }}"
                class="w-full md:w-56 h-80 object-cover rounded-xl"
                alt="Poster de {{ $filme->titulo }}">

            {{-- INFOS --}}
            <div class="flex flex-col gap-4 justify-center">
                <h1 class="text-3xl font-bold text-white">{{ $filme->titulo }}</h1>

                <div class="flex flex-wrap gap-2">
                    @foreach($filme->generos as $genero)
                        <span class="bg-violet-800 text-violet-200 px-3 py-1 rounded-full text-sm">
                            {{ $genero->genero }}
                        </span>
                    @endforeach
                </div>

                <span class="text-slate-400 text-sm">⏱ {{ $filme->duracao }}</span>

                <p class="text-slate-300 text-sm leading-relaxed">{{ $filme->sinopse }}</p>
            </div>

        </div>
    </div>

</body>
</html>