# Data Transfer Objects (DTOs)

Este documento descreve os DTOs utilizados no sistema de gerenciamento de produtos.

## ProdutoDTO

Responsável por transferir dados do produto entre as camadas da aplicação.

```php
class ProdutoDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $nome,
        public readonly string $descricao,
        public readonly float $preco,
        public readonly bool $status,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null
    ) {}
}
```

### Atributos

| Atributo    | Tipo      | Descrição                                    |
|-------------|-----------|----------------------------------------------|
| id          | ?int      | Identificador único do produto               |
| nome        | string    | Nome do produto                              |
| descricao   | string    | Descrição detalhada do produto              |
| preco       | float     | Preço do produto                            |
| status      | bool      | Status do produto (ativo/inativo)           |
| created_at  | ?string   | Data de criação do registro                 |
| updated_at  | ?string   | Data da última atualização do registro      |

### Uso

O ProdutoDTO é utilizado principalmente em:

1. Transferência de dados entre o controller e o service layer
2. Resposta de APIs
3. Validação de dados de entrada
4. Transformação de dados do modelo para apresentação

### Exemplo de Uso

```php
// Criando um novo ProdutoDTO
$produtoDTO = new ProdutoDTO(
    id: null,
    nome: 'Produto Teste',
    descricao: 'Descrição do produto teste',
    preco: 99.99,
    status: true
);

// Convertendo um Model para DTO
$produtoDTO = new ProdutoDTO(
    id: $produto->id,
    nome: $produto->nome,
    descricao: $produto->descricao,
    preco: $produto->preco,
    status: $produto->status,
    created_at: $produto->created_at,
    updated_at: $produto->updated_at
);
```

## BuscaProdutoDTO

Utilizado para transferir parâmetros de busca de produtos.

```php
class BuscaProdutoDTO
{
    public function __construct(
        public readonly ?string $termo,
        public readonly ?bool $status = null,
        public readonly ?float $precoMinimo = null,
        public readonly ?float $precoMaximo = null,
        public readonly int $porPagina = 12
    ) {}
}
```

### Atributos

| Atributo     | Tipo    | Descrição                                    |
|--------------|---------|----------------------------------------------|
| termo        | ?string | Termo de busca para nome/descrição           |
| status       | ?bool   | Filtro por status do produto                 |
| precoMinimo  | ?float  | Preço mínimo para filtro                     |
| precoMaximo  | ?float  | Preço máximo para filtro                     |
| porPagina    | int     | Quantidade de itens por página               |

### Uso

O BuscaProdutoDTO é utilizado para:

1. Encapsular parâmetros de busca
2. Padronizar filtros de produtos
3. Facilitar a paginação de resultados

### Exemplo de Uso

```php
// Criando um DTO de busca
$buscaDTO = new BuscaProdutoDTO(
    termo: 'notebook',
    status: true,
    precoMinimo: 1000.00,
    precoMaximo: 5000.00,
    porPagina: 20
);
```

## Boas Práticas

1. DTOs devem ser imutáveis (readonly)
2. Use tipos explícitos para todos os atributos
3. Documente todos os atributos e seus propósitos
4. Mantenha os DTOs simples e focados em uma única responsabilidade
5. Use named arguments ao instanciar DTOs para melhor legibilidade 