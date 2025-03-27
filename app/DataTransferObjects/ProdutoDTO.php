<?php

namespace App\DataTransferObjects;

use App\Enums\StatusProduto;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * DTO para transferência de dados do Produto
 * 
 * Esta classe é responsável por garantir a integridade dos dados
 * durante a transferência entre diferentes camadas da aplicação
 */
class ProdutoDTO extends DataTransferObject
{
    public function __construct(
        public readonly string $nome,        // Nome do produto
        public readonly string $descricao,   // Descrição detalhada do produto
        public readonly float $preco,        // Preço do produto
        public readonly StatusProduto $status, // Status atual do produto
    ) {}
} 