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
        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cpf', 11)->unique()->nullable(false);
            $table->string('sexo', 1)->nullable(false);
            $table->string('pnome', 30)->nullable(false);
            $table->string('unome', 30)->nullable(false);
            $table->text('endereco')->nullable(true);
            $table->date('data_nasc')->nullable(false);
            $table->double('peso', 3, 1)->nullable(true);
            $table->integer('altura')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
