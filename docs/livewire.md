# Livewire Components

## BuscaProdutos

Componente Livewire para busca dinâmica de produtos.

```php
<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class BuscaProdutos extends Component
{
    use WithPagination;

    public string $busca = '';
    public string $status = '';

    protected $queryString = [
        'busca' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function updatingBusca()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $produtos = Produto::query()
            ->when($this->busca, function ($query) {
                $query->where(function ($query) {
                    $query->where('nome', 'like', '%' . $this->busca . '%')
                        ->orWhere('descricao', 'like', '%' . $this->busca . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.busca-produtos', [
            'produtos' => $produtos
        ]);
    }
}
```

### View (busca-produtos.blade.php)

```php
<div>
    <div class="mb-4">
        <div class="flex gap-4">
            <div class="flex-1">
                <input
                    wire:model.live.debounce.500ms="busca"
                    type="text"
                    placeholder="Buscar produtos..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            <div class="w-48">
                <select
                    wire:model.live="status"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                    <option value="">Todos os status</option>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
        </div>
    </div>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($produtos as $produto)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $produto->nome }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($produto->descricao, 100) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $produto->status->value === 'ativo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $produto->status->label() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('filament.admin.resources.produtos.edit', $produto) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                Nenhum produto encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $produtos->links() }}
    </div>
</div>
```

### Explicação

- Componente Livewire com paginação
- Busca dinâmica com debounce de 500ms
- Filtragem por status
- Interface responsiva com Tailwind CSS
- Paginação automática

### Uso

```php
// Em qualquer view
<livewire:busca-produtos />
```

### Benefícios

1. Busca em tempo real
2. Filtragem dinâmica
3. Paginação automática
4. Interface responsiva
5. Performance otimizada com debounce 