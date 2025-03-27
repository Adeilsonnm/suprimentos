# Observers

## ProdutoObserver

Observer para monitorar eventos do modelo Produto.

```php
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
```

### Registro do Observer

O observer é registrado no `AppServiceProvider`:

```php
<?php

namespace App\Providers;

use App\Models\Produto;
use App\Observers\ProdutoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Produto::observe(ProdutoObserver::class);
    }
}
```

### Explicação

- Monitora eventos de criação, atualização e exclusão
- Registra logs detalhados de cada operação
- Mantém histórico de alterações
- Integração com o sistema de logs do Laravel

### Eventos Monitorados

1. **created**
   - Dispara quando um novo produto é criado
   - Registra ID, nome, preço e status

2. **updated**
   - Dispara quando um produto é atualizado
   - Registra ID, nome, preço e status

3. **deleted**
   - Dispara quando um produto é excluído
   - Registra ID e nome

### Benefícios

1. Rastreamento de operações
2. Auditoria de alterações
3. Debug facilitado
4. Histórico de mudanças
5. Separação de responsabilidades 