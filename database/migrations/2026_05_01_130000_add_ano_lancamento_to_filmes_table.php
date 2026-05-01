<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adiciona o ano de lançamento do filme.
     */
    public function up(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->unsignedSmallInteger('ano_lancamento')->nullable()->after('duracao');
        });
    }

    /**
     * Remove o ano de lançamento do filme.
     */
    public function down(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->dropColumn('ano_lancamento');
        });
    }
};
