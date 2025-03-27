<?php

namespace App\Observers;

use App\Models\Produto;
use Illuminate\Support\Facades\Log;

class ProdutoObserver
{
    /**
     * Handle the Produto "created" event.
     */
    public function created(Produto $produto): void
    {
        Log::info('Novo produto criado', [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'status' => $produto->status->label(),
        ]);
    }

    /**
     * Handle the Produto "updated" event.
     */
    public function updated(Produto $produto): void
    {
        Log::info('Produto atualizado', [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'status' => $produto->status->label(),
        ]);
    }

    /**
     * Handle the Produto "deleted" event.
     */
    public function deleted(Produto $produto): void
    {
        Log::info('Produto excluído', [
            'id' => $produto->id,
            'nome' => $produto->nome,
        ]);
    }
} 