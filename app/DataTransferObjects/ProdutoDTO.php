<?php

namespace App\DataTransferObjects;

use App\Enums\StatusProduto;
use Spatie\DataTransferObject\DataTransferObject;

class ProdutoDTO extends DataTransferObject
{
    public function __construct(
        public readonly string $nome,
        public readonly string $descricao,
        public readonly float $preco,
        public readonly StatusProduto $status,
    ) {}
} 