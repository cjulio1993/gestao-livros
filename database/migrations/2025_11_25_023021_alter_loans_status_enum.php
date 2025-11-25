<?php

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    FacadesDB::statement("ALTER TABLE loans ALTER COLUMN status TYPE VARCHAR(255)");
    FacadesDB::statement("DROP TYPE IF EXISTS loans_status_enum");
    
    Schema::table('loans', function (Blueprint $table) {
        $table->enum('status', ['emprestado', 'devolvido', 'atrasado'])
              ->default('emprestado')
              ->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
