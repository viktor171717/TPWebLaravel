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
        Schema::create('contracts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        $table->unsignedInteger('hours_included'); // ex: 50
        $table->decimal('hourly_rate', 8, 2)->default(0); // taux horaire sup.
        $table->date('starts_at')->nullable();
        $table->date('ends_at')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
