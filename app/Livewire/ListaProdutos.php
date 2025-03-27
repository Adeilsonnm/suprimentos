<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListaProdutos extends Component
{
    use WithPagination;

    public function render()
    {
        $produtos = Produto::query()
            ->latest()
            ->paginate(12);

        return view('livewire.lista-produtos', [
            'produtos' => $produtos
        ]);
    }
} 