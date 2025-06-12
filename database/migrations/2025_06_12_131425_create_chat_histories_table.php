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
        Schema::create('chat_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->text('message'); // The chat message content
            $table->string('language')->default('English'); // Language of the chat message
            $table->string('context')->nullable(); // Context in which the chat message was sent
            $table->string('status')->default('active'); // Status of the chat history (e.g., active, archived)
            $table->string('source')->nullable(); // Source of the chat history (e.g., web, mobile)
            $table->integer('order')->default(0); // Order of the chat history entry in a sequence
            
            $table->timestamps();
            $table->softDeletes(); // Soft delete column
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_histories');
    }
};
