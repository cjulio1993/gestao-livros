<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('leitores')->onDelete('restrict');
            $table->foreignId('book_id')->constrained('books')->onDelete('restrict');
            
            $table->timestamp('loan_date')->useCurrent();
            $table->timestamp('due_date');
            $table->timestamp('return_date')->nullable();
            
            // CORRIGIDO: valores mais lógicos e padrão do mercado
            $table->enum('status', ['emprestado', 'devolvido', 'atrasado'])
                  ->default('emprestado');
            
            $table->timestamps();

            // Índices úteis
            $table->index(['user_id', 'status']);
            $table->index(['book_id', 'status']);
            $table->index('due_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};