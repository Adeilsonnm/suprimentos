<?php

namespace App\Models;

use App\Enums\StatusProduto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

/**
 * Modelo de Produto
 * 
 * Responsável por gerenciar os dados e regras de negócio
 * relacionados aos produtos no sistema
 */
class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';

    /**
     * Campos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'status',
    ];

    /**
     * Conversão automática de tipos
     */
    protected $casts = [
        'preco' => 'decimal:2',
        'status' => StatusProduto::class,
    ];

    /**
     * Regras de validação para o modelo
     * 
     * Define as regras para garantir a integridade dos dados
     * durante a criação e atualização de produtos
     */
    public static function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],      // Nome é obrigatório
            'descricao' => ['required', 'string'],            // Descrição é obrigatória
            'preco' => ['required', 'numeric', 'min:0'],      // Preço deve ser positivo
            'status' => ['required', Rule::enum(StatusProduto::class)], // Status válido
        ];
    }
} 