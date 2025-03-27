<?php

namespace App\Enums;

/**
 * Enum para gerenciar os estados possíveis de um produto
 * 
 * Fornece uma maneira segura de controlar os estados
 * e suas representações visuais
 */
enum StatusProduto: string
{
    case ATIVO = 'ativo';     // Produto disponível para venda
    case INATIVO = 'inativo'; // Produto indisponível para venda

    /**
     * Retorna o rótulo amigável do status
     */
    public function label(): string
    {
        return match($this) {
            self::ATIVO => 'Ativo',
            self::INATIVO => 'Inativo',
        };
    }
} 