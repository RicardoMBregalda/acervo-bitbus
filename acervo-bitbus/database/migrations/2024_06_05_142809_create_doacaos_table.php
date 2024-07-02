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
        Schema::create('doacaos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_doacao');
            $table->decimal('valor', 11, 2)->default(0.00);
            $table->text('detalhes')->nullable();
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
