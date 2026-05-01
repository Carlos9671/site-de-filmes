<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myCine - Gêneros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white min-h-screen">

    <nav class="bg-slate-900 border-b border-slate-700 px-8 py-4 flex items-center justify-between">
        <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 CineVault</span>
        <a href="/filmes" class="text-slate-400 hover:text-violet-400 text-sm transition">← Voltar</a>
    </nav>

    <div class="max-w-2xl mx-auto py-10 px-6">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-violet-400">Gêneros</h1>
            <a href="/generos/create" class="bg-violet-700 hover:bg-violet-600 text-white text-sm px-4 py-2 rounded-lg transition">
                + Novo Gênero
            </a>
        </div>

        @if(session('success'))
            <div class="bg-violet-900 text-violet-200 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col gap-3">
            @foreach($generos as $genero)
                <div class="bg-slate-900 border border-slate-700 rounded-xl px-6 py-4 flex items-center justify-between">
                    <span class="text-white">{{ $genero->genero }}</span>
                    <form action="/generos/{{ $genero->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm transition"
                            onclick="return confirm('Tem certeza que deseja deletar este gênero?')">
                            Deletar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>