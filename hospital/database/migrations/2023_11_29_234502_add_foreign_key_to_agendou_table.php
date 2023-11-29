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
        Schema::table('agendou', function (Blueprint $table) {
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');
            $table->foreign('recepcionista_id')->references('id')->on('recepcionista')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agendou', function (Blueprint $table) {
            //
        });
    }
};
