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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('profissional_id');
            $table->string('cliente_nome');
            $table->dateTime('data_hora');
            $table->timestamps();
    
            // Garante que o mesmo profissional não tenha dois agendamentos no mesmo minuto
            $table->unique(['profissional_id', 'data_hora']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
