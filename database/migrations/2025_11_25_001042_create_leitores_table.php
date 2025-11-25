<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leitores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->char('cpf', 11)->unique()->nullable();
            $table->string('rg', 20)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->text('endereco')->nullable();
            $table->string('numero_carteirinha', 20)->unique()->nullable();
            $table->boolean('ativo')->default(true);
            $table->date('data_cadastro')->default(now()->format('Y-m-d'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leitores');
    }
};
