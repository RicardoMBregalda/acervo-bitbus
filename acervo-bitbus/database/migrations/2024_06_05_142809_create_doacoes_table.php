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
        Schema::create('doacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_doacao');
            $table->decimal('valor', 11, 2);
            $table->text('detalhes');
            $table->unsignedBigInteger('participante_id');
            $table->timestamps();
            $table->foreign('participante_id')->references('id')->on('participantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacoes');
    }
};
