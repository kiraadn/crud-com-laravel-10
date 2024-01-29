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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('packing');
            $table->string('generic_name')->unique();
            $table->string('nome_fornecedor');
            $table->tinyInteger('isDeleted')->default(0)->comment('0:NO Delete, 1:Yes Delete');
            $table->date('data_validade');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
