<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * criar as ligações entre as tabelas
     */
    public function up(): void
    {
        Schema::create('filme_genero', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filme_id')->constrained('filmes')->onDelete('cascade');  //cascade desliga a ligação caso delete o filme
            $table->foreignId('genero_id')->constrained('generos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filme_genero');
    }
};
