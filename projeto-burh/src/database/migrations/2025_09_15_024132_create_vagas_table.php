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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->keys('empresa_id')->references('id')->on('empresas');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('cnpj')->unique();
            $table->enum('tipo', ['PJ', 'CLT', 'E']);
            $table->decimal('salario', 10, 2);
            $table->string('horario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
