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
        Schema::create('dias_repetidos', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('colaborador_id');
            $table->timestamps();

            // Chave estrangeira para o colaborador (opcional, depende do seu modelo de dados)
            $table->foreign('colaborador_id')->references('id')->on('colaboradores');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias_repetidos');
    }
};
