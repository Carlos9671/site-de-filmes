<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCine</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 flex items-center justify-center">

    <div class="w-full max-w-md px-6" x-data="{ tela: 'login' }">

        <h1 class="text-center text-3xl font-bold text-violet-400 mb-8 tracking-widest uppercase">
            🎬 MyCine
        </h1>

        {{-- LOGIN --}}
        <form action="/login" method="POST" class="bg-slate-900 border border-slate-700 rounded-xl p-8 flex flex-col gap-4">
            @csrf

            {{-- ERRO --}}
            @if(session('erro'))
                <div class="bg-red-600 text-white p-2 rounded text-sm">
                    {{ session('erro') }}
                </div>
            @endif

            <div>
                <label class="text-slate-400 text-sm mb-1 block">Usuário</label>
                <input type="text" name="usuario" placeholder="usuário"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="text-slate-400 text-sm mb-1 block">Senha</label>
                <input type="password" name="senha" placeholder="••••••••"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2">
            </div>

            <button type="submit"
                class="w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-2 rounded-lg transition">
                Entrar
            </button>
        </form>

    </div>

</body>
</html>