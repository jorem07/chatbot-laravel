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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intent_id')
                ->constrained('intents')
                ->onDelete('cascade');
                
            $table->string('response_type'); // e.g., 'text', 'image', 'video'
            $table->text('content'); // JSON or text content for the response
            $table->string('language')->default('en'); // Language of the response
            $table->boolean('is_active')->default(true); // Whether the response is active
            $table->integer('order')->default(0); // Order of the response in a sequence
            
            // Additional metadata columns can be added as needed
            $table->string('metadata')->nullable(); // JSON column for additional metadata
            $table->string('context')->nullable(); // Context in which the response is used
            $table->string('source')->nullable(); // Source of the response content
            $table->string('status')->default('active'); // Status of the response (e.g., active, inactive, archived)
            $table->timestamps();
            $table->softDeletes(); // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
