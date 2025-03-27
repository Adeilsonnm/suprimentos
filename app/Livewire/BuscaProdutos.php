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