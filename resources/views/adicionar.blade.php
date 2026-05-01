<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCine - Adicionar Filmes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-950 text-white min-h-screen">

    {{-- NAVBAR --}}
    <nav class="bg-slate-900 border-b border-slate-700 px-8 py-4 flex items-center justify-between">
        <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 MyCine</span>
        <a href="/filmes" class="text-slate-400 hover:text-violet-400 text-sm transition">← Voltar</a>
    </nav>

    <div class="max-w-2xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold text-violet-400 mb-8">Adicionar Filme</h1>

        @if ($errors->any())
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                <ul class="text-sm">
                    @foreach ($errors->all() as $erro)
                        <li>• {{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/filmes" method="POST" class="flex flex-col gap-6">
            @csrf

            {{-- TÍTULO --}}
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" placeholder="Nome do filme"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>

            {{-- SINOPSE --}}
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Sinopse</label>
                <textarea name="sinopse" rows="4" placeholder="Descrição do filme..."
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">{{  old('sinopse') }}</textarea>
            </div>

            {{-- DURAÇÃO --}}
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Duração</label>
                <input type="text" name="duracao" value="{{ old('duracao') }}" placeholder="Ex: 2h 30min"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>

            {{-- ANO DE LANÇAMENTO --}}
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Ano de lançamento</label>
                <input type="number" name="ano_lancamento" value="{{ old('ano_lancamento') }}" placeholder="Ex: 2014"
                    min="1888" max="{{ date('Y') }}"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>

            {{-- POSTER --}}
            <div>
                <label class="text-slate-400 text-sm mb-1 block">URL do Poster</label>
                <input type="text" name="poster" value="{{ old('poster') }}" placeholder="https://..."
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>

            {{-- GÊNEROS --}}
            <div>
                <label class="text-slate-400 text-sm mb-2 block">Gêneros</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($generos as $genero)
                        <label class="cursor-pointer">
                            <input type="checkbox" name="generos[]" value="{{ $genero->id }}"
                                class="hidden peer"
                                {{ in_array($genero->id, old('generos', [])) ? 'checked' : '' }}>

                            <span class="px-3 py-1 rounded-full text-sm border border-slate-600 text-slate-400
                                peer-checked:bg-violet-700 peer-checked:text-white peer-checked:border-violet-700 transition">
                                {{ $genero->genero }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit"
                class="w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-2 rounded-lg transition">
                Salvar Filme
            </button>

        </form>
    </div>

</body>
</html>
