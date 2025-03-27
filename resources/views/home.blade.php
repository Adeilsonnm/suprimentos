<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Nossos Produtos</h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($produtos as $produto)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $produto->nome }}</h2>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($produto->descricao, 100) }}
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-indigo-600">
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </span>
                            <span class="px-3 py-1 text-sm rounded-full {{ $produto->status->value === 'ativo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $produto->status->label() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $produtos->links() }}
        </div>
    </div>
</body>
</html> 