<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('isbn', 13)->unique();
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->string('publisher')->nullable();
            $table->integer('publication_year')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('available')->default(1);
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();

            $table->index(['title', 'author']);
            $table->index('isbn');
            $table->index('available');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
