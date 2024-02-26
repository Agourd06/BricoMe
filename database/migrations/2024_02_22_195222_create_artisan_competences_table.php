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
        Schema::create('artisan_competences', function (Blueprint $table) {
            $table->id();
            $table->string('tarif')->nullable();
            $table->foreignId('artisan_id')->constrained('artisans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('competence')->constrained('competences')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisan_competences');
    }
};
