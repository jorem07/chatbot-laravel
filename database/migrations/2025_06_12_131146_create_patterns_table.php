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
        Schema::create('patterns', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to the intents table
            // This assumes that the intents table has already been created
            $table->foreignId('intent_id')
                ->constrained('intents')
                ->onDelete('cascade');

            $table->string('pattern'); // The pattern or phrase to match
            $table->string('language')->default('English'); // Language of the pattern
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patterns');
    }
};
