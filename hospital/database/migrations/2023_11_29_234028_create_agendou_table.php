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
        Schema::create('agendou', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('grau_prioridade', 6)->nullable(false);
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('recepcionista_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendou');
    }
};
