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
        <div x-show="tela === 'login'" class="bg-slate-900 border border-slate-700 rounded-xl p-8 flex flex-col gap-4">
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Email</label>
                <input type="email" placeholder="seu@email.com"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Senha</label>
                <input type="password" placeholder="••••••••"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>
            <a href="#" class="text-violet-400 text-sm text-right hover:underline">Esqueceu a senha?</a>
            <a href="/filmes" class="w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-2 rounded-lg transition text-center">
                Entrar
            </a>
            <button @click="tela = 'cadastro'" type="button" class="w-full text-violet-400 text-sm hover:underline">
                Não tenho conta
            </button>
        </div>

        {{-- CADASTRO --}}
        <div x-show="tela === 'cadastro'" class="bg-slate-900 border border-slate-700 rounded-xl p-8 flex flex-col gap-4">
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Nome completo</label>
                <input type="text" placeholder="Seu nome"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Email</label>
                <input type="email" placeholder="seu@email.com"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Senha</label>
                <input type="password" placeholder="••••••••"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>
            <div>
                <label class="text-slate-400 text-sm mb-1 block">Confirmar senha</label>
                <input type="password" placeholder="••••••••"
                    class="w-full bg-slate-800 text-white border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-violet-500">
            </div>
            <button class="w-full bg-violet-700 hover:bg-violet-600 text-white font-semibold py-2 rounded-lg transition">
                Registrar
            </button>
            <button @click="tela = 'login'" type="button" class="w-full text-violet-400 text-sm hover:underline">
                Já tenho conta
            </button>
        </div>

    </div>

</body>
</html>