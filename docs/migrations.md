# Migrations

## create_produtos_table

Migration para criar a tabela de produtos.

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
```

### Explicação

- Cria a tabela 'produtos'
- Define campos necessários
- Implementa soft deletes
- Adiciona timestamps

### Campos

1. **id**
   - Chave primária auto-incrementada
   - Tipo: bigint

2. **nome**
   - Nome do produto
   - Tipo: string
   - Máximo: 255 caracteres

3. **descricao**
   - Descrição detalhada
   - Tipo: text
   - Sem limite de caracteres

4. **preco**
   - Preço do produto
   - Tipo: decimal
   - 10 dígitos no total
   - 2 casas decimais

5. **status**
   - Status do produto
   - Tipo: string
   - Armazena o valor do enum

6. **timestamps**
   - created_at
   - updated_at

7. **softDeletes**
   - deleted_at

### Uso

Para executar a migration:

```bash
php artisan migrate
```

Para reverter:

```bash
php artisan migrate:rollback
```

### Benefícios

1. Versionamento do banco de dados
2. Soft deletes para exclusão lógica
3. Campos adequados para cada tipo de dado
4. Fácil reversão de alterações
5. Consistência do banco de dados 