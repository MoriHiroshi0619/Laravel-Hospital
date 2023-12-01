<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enfermeira', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('especialidade', 30)->nullable(true);
            $table->string('corem', 11)->Unique()->nullable(true);
            $table->unsignedBigInteger('funcionario_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfermeira');
    }
};
