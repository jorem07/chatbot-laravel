<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatHistory extends Model
{
    protected $fillable = ['user_id', 'message', 'response', 'language', 'status'];

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
     * Get the user that owns the chat history.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the response associated with the chat history.
     */
    public function response()
    {
        return $this->belongsTo(Response::class);
    }
    /**
     * Get the chat history in a formatted way.
     *
     * @return array
     */
    public function getFormattedHistory(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'message' => $this->message,
            'response' => $this->response ? $this->response->content : null,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
    /**
     * Scope a query to only include active chat histories.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    /**
     * Scope a query to only include chat histories by a specific user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
    /**
     * Scope a query to only include chat histories with a specific language.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithLanguage($query, $language)
    {
        return $query->where('language', $language);
    }
}
