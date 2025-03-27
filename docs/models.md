# Models

## Produto

O modelo `Produto` representa a entidade de produtos no sistema.

```php
<?php

namespace App\Models;

use App\Enums\StatusProduto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'status',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'status' => StatusProduto::class,
    ];

    /**
     * Regras de validação para o modelo
     */
    public static function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'preco' => ['required', 'numeric', 'min:0'],
            'status' => ['required', Rule::enum(StatusProduto::class)],
        ];
    }
}
```

### Explicação

- Utiliza traits `HasFactory` e `SoftDeletes`
- Define a tabela como 'produtos'
- Define campos preenchíveis
- Configura casts para preço e status
- Implementa regras de validação

### Uso

```php
// Criar um produto
$produto = Produto::create([
    'nome' => 'Produto Teste',
    'descricao' => 'Descrição',
    'preco' => 99.99,
    'status' => StatusProduto::ATIVO
]);

// Buscar produtos
$produtos = Produto::where('status', StatusProduto::ATIVO)->get();

// Exclusão lógica
$produto->delete(); // Não exclui do banco, apenas marca como deletado

// Recuperar produto excluído
$produto->restore();
```

### Benefícios

1. Soft Deletes para exclusão lógica
2. Validação integrada
3. Tipagem forte com casts
4. Factory para testes
5. Regras de validação centralizadas 