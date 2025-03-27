<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Produtos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Cabeçalho -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Sistema de Produtos
                        </h1>
                        <a href="{{ route('filament.admin.pages.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Painel Administrativo
                        </a>
                                        </div>
                                    </div>
            </header>

            <!-- Conteúdo Principal -->
            <main>
                <livewire:lista-produtos />
                    </main>

            <!-- Rodapé -->
            <footer class="bg-white shadow mt-8">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-gray-500 text-sm">
                        &copy; {{ date('Y') }} Sistema de Produtos. Todos os direitos reservados.
                    </p>
                </div>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
