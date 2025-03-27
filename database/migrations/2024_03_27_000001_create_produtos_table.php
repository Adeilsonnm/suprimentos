<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para criar a tabela de produtos
 */
return new class extends Migration
{
    /**
     * Executa a migração
     * 
     * Cria a tabela de produtos com todos os campos necessários
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();                    // Identificador único
            $table->string('nome');          // Nome do produto
            $table->text('descricao');       // Descrição detalhada
            $table->decimal('preco', 10, 2); // Preço com 2 casas decimais
            $table->string('status');        // Status do produto
            $table->timestamps();            // Datas de criação/atualização
            $table->softDeletes();           // Suporte à exclusão lógica
        });
    }

    /**
     * Reverte a migração
     * 
     * Remove a tabela de produtos do banco de dados
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
}; 