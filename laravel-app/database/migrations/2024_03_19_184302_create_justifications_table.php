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
        Schema::create('justifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dia_repetido_id');
            $table->text('descricao');
            // Adicione mais campos conforme necessário

            $table->timestamps();

            $table->foreign('dia_repetido_id')
                ->references('id')->on('dias_repetidos')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('justifications');
    }
};
