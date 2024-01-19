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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nomeRepresntante');
            $table->string('telefone');
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->string('tipoFornecedor');
            $table->string('endereco');
            $table->string('EntidadeFornecedor');
            $table->string('Nuit')->nullable();
            $table->string('areaActuacao')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
