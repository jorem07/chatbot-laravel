<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatbotSettings extends Model
{
    protected $fillable = ['name', 'greeting_message', 'default_response', 'language', 'profile_picture'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * Get the greeting message for the chatbot.
     *
     * @return string
     */
    public function getGreetingMessage(): string
    {
        return $this->greeting_message ?? 'Hello! How can I assist you today?';
    }
    /**
     * Get the default response for the chatbot.
     *
     * @return string
     */
    public function getDefaultResponse(): string
    {
        return $this->default_response ?? 'I am here to help you with your queries.';
    }
    /**
     * Get the language of the chatbot.
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language ?? 'English';
    }
    /**
     * Get the profile picture URL or path of the chatbot.
     *
     * @return string|null
     */
    public function getProfilePicture(): ?string
    {
        return $this->profile_picture ?? null;
    }
    /**
     * Set the greeting message for the chatbot.
     *
     * @param string $message
     */
    public function setGreetingMessage(string $message): void
    {
        $this->greeting_message = $message;
        $this->save();
    }
    /**
     * Set the default response for the chatbot.
     *
     * @param string $response
     */
    public function setDefaultResponse(string $response): void
    {
        $this->default_response = $response;
        $this->save();
    }
    /**
     * Set the language of the chatbot.
     *
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
        $this->save();
    }
    /**
     * Set the profile picture URL or path of the chatbot.
     *
     * @param string|null $picture
     */
    public function setProfilePicture(?string $picture): void
    {
        $this->profile_picture = $picture;
        $this->save();
    }
    
}
