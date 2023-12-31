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
        Schema::table('medico', function (Blueprint $table) {
            $table->foreign('funcionario_id')->references('id')->on('funcionario')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medico', function (Blueprint $table) {
            $table->dropColumn('funcionario_id');
        });
    }
};
