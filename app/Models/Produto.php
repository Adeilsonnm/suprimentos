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