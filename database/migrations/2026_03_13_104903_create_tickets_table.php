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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        $table->foreignId('user_id')->nullable()->constrained(); // assigné à
        $table->enum('status', [
            'nouveau', 'en_cours', 'en_attente',
            'termine', 'a_valider', 'valide', 'refuse'
        ])->default('nouveau');
        $table->enum('type', ['included', 'billable'])->default('included');
        $table->enum('priority', ['basse', 'normale', 'haute', 'urgente'])
               ->default('normale');
        $table->unsignedInteger('estimated_time')->nullable();
        $table->unsignedInteger('real_time')->default(0);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
