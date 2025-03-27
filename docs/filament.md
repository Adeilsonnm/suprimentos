# Filament Resources

## ProdutoResource

O recurso Filament para gerenciamento de produtos.

```php
<?php

namespace App\Filament\Resources;

use App\Enums\StatusProduto;
use App\Filament\Resources\ProdutoResource\Pages;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Produtos';
    protected static ?string $modelLabel = 'Produto';
    protected static ?string $pluralModelLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descricao')
                    ->label('Descrição')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preço')
                    ->required()
                    ->numeric()
                    ->prefix('R$'),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(collect(StatusProduto::cases())->mapWithKeys(fn ($status) => [$status->value => $status->label()]))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (StatusProduto $state): string => match ($state) {
                        StatusProduto::ATIVO => 'success',
                        StatusProduto::INATIVO => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options(collect(StatusProduto::cases())->mapWithKeys(fn ($status) => [$status->value => $status->label()])),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}
```

### Explicação

- Define o modelo e configurações de navegação
- Implementa formulário com validação
- Implementa tabela com ordenação e filtros
- Define ações e ações em lote
- Configura rotas para CRUD

### Páginas

1. **ListProdutos**
   - Lista todos os produtos
   - Permite criar novos produtos
   - Implementa filtros e ordenação

2. **CreateProduto**
   - Formulário de criação
   - Validação automática
   - Redirecionamento após criação

3. **EditProduto**
   - Formulário de edição
   - Validação automática
   - Permite exclusão

### Benefícios

1. Interface administrativa completa
2. Validação automática
3. Tradução em português
4. Filtros e ordenação
5. Ações em lote 