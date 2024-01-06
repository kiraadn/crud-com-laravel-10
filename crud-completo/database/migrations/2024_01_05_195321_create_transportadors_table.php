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
        Schema::create('transportadors', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCompleto', 100);
            $table->string('celular', 14)->unique();
            $table->string('telefone', 14)->nullable()->unique();
            $table->string('email')->unique();
            $table->string('morada');
            $table->string('areaActuacao');
            $table->string('tipoEmpresa');
            $table->string('cartaConducao');
            $table->string('cartaValidade');
            $table->string('metodoPagamento');
            $table->string('contaPagamento');
            $table->string('biFrontal');
            $table->string('biTraseira');
            $table->string('licensa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportadors');
    }
};
