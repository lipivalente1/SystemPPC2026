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
        Schema::create('ppcs', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('ch');
            $table->integer('n_semestres');
            $table->text('justificativa');
            $table->text('impacto');
            $table->text('disciplinas');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppcs');
    }
};
