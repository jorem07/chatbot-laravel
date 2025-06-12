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
        Schema::create('chatbot_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Unique name for the setting
            $table->string('greeting_message')->nullable(); // Greeting message for the chatbot
            $table->string(('default_response')); // Default response for the chatbot
            $table->string('language')->default('English'); // Default language for the chatbot
            $table->string('profile_picture')->nullable(); // URL or path to the profile picture of the chatbot
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbot_settings');
    }
};
