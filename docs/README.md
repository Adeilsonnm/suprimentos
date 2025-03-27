# Documentação do Sistema de Produtos

Este documento descreve a implementação de um sistema de gerenciamento de produtos utilizando Laravel 11, Filament e Livewire.

## Estrutura do Projeto

O projeto está organizado nos seguintes diretórios principais:

- `app/Enums/` - Contém as definições de enums
- `app/DataTransferObjects/` - Contém os DTOs
- `app/Models/` - Contém os modelos
- `app/Filament/` - Contém os recursos do Filament
- `app/Livewire/` - Contém os componentes Livewire
- `app/Observers/` - Contém os observers
- `resources/views/` - Contém as views

## Requisitos

- PHP 8.3
- Laravel 11
- Filament 3.3
- Livewire
- MySQL/PostgreSQL

## Instalação

1. Clone o repositório
2. Instale as dependências:
```bash
composer install
npm install
```

3. Configure o arquivo .env:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

5. Execute as migrações:
```bash
php artisan migrate
```

6. Inicie o servidor:
```bash
php artisan serve
npm run dev
```

## Acesso ao Sistema

- Painel Administrativo: http://localhost:8000/admin
- Busca de Produtos: http://localhost:8000/produtos

## Documentação dos Componentes

Cada componente do sistema está documentado em arquivos separados:

- [Enums](enums.md)
- [DTOs](dtos.md)
- [Models](models.md)
- [Filament Resources](filament.md)
- [Livewire Components](livewire.md)
- [Observers](observers.md)
- [Views](views.md)
- [Migrations](migrations.md)

## Testes

Para executar os testes:

```bash
php artisan test
```

## Funcionalidades Implementadas

1. CRUD de Produtos
   - Criação, leitura, atualização e exclusão de produtos
   - Validação de dados
   - Interface administrativa com Filament

2. Busca Dinâmica
   - Busca em tempo real com debounce de 500ms
   - Filtragem por status
   - Paginação

3. DTO
   - Transferência segura de dados
   - Validação de tipos
   - Imutabilidade

4. Enum para Status
   - Tipagem forte
   - Valores predefinidos
   - Labels em português

5. Soft Deletes
   - Exclusão lógica
   - Recuperação de registros

6. Observers
   - Logging de operações
   - Rastreamento de alterações 