# Enums

## StatusProduto

O enum `StatusProduto` é responsável por gerenciar os estados possíveis de um produto.

```php
<?php

namespace App\Enums;

enum StatusProduto: string
{
    case ATIVO = 'ativo';
    case INATIVO = 'inativo';

    public function label(): string
    {
        return match($this) {
            self::ATIVO => 'Ativo',
            self::INATIVO => 'Inativo',
        };
    }
}
```

### Explicação

- O enum é definido como `string` para armazenar os valores como strings no banco de dados
- Possui dois casos: `ATIVO` e `INATIVO`
- O método `label()` retorna o nome amigável do status em português
- Utiliza o match expression do PHP 8 para retornar o label apropriado

### Uso

```php
// Criar um status
$status = StatusProduto::ATIVO;

// Obter o valor
echo $status->value; // 'ativo'

// Obter o label
echo $status->label(); // 'Ativo'

// Verificar o status
if ($status === StatusProduto::ATIVO) {
    // ...
}
```

### Benefícios

1. Tipagem forte
2. Valores predefinidos
3. Labels em português
4. Fácil integração com o Filament
5. Prevenção de erros de digitação 