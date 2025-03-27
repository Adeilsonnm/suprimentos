<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Produtos Disponíveis</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($produtos as $produto)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $produto->nome }}</h3>
                                    <span class="px-3 py-1 text-sm rounded-full {{ $produto->status->value === 'ativo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $produto->status->label() }}
                                    </span>
                                </div>

                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ $produto->descricao }}
                                </p>

                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-indigo-600">
                                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                    </span>
                                    <a href="{{ route('filament.admin.resources.produtos.edit', $produto) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <div class="text-gray-500">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum produto encontrado</h3>
                                <p class="mt-1 text-sm text-gray-500">Comece criando um novo produto.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $produtos->links() }}
                </div>
            </div>
        </div>
    </div>
</div> 