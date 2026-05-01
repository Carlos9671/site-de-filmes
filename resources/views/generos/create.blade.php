<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVault - Novo Gênero</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white min-h-screen">

    <nav class="bg-slate-900 border-b border-slate-700 px-8 py-4 flex items-center justify-between">
        <span class="text-violet-400 font-bold text-xl tracking-widest uppercase">🎬 CineVault</span>
        <a href="/generos" class="text-slate-400 hover:text-violet-400 text-sm transition">← Voltar</a>
    </nav>

    <div class="max-w-md mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold text-violet-400 mb-8">Novo Gênero</h1>

        <form action="/generos" method="POST" class="flex flex-col gap-6">
            @csrf

            <div>
                <label class="text-slate-400 text-sm mb-1 block">Nome do Gênero</label>
                <input type="text" name="genero" placeholder="Ex: Suspense"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
                @error('genero')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-2 rounded-lg transition">
                Salvar Gênero
            </button>
        </form>
    </div>

</body>
</html>