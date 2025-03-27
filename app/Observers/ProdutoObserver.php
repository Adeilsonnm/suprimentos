<?php

namespace App\Observers;

use App\Models\Produto;
use Illuminate\Support\Facades\Log;

/**
 * Observer do Produto
 * 
 * Monitora e registra todas as operações realizadas
 * nos produtos do sistema
 */
class ProdutoObserver
{
    /**
     * Manipula o evento de criação de produto
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
     * Manipula o evento de atualização de produto
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
     * Manipula o evento de exclusão de produto
     */
    public function deleted(Produto $produto): void
    {
        Log::info('Produto excluído', [
            'id' => $produto->id,
            'nome' => $produto->nome,
        ]);
    }
} 