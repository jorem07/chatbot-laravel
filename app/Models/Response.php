<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['intent_id', 'content', 'language'];

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
     * Get the intent associated with the response.
     */
    public function intent()
    {
        return $this->belongsTo(Intent::class);
    }

    /**
     * Get the response in a formatted way.
     *
     * @return array
     */
    public function getFormattedResponse(): array
    {
        return [
            'id' => $this->id,
            'intent_id' => $this->intent_id,
            'content' => $this->content,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
    /**
     * Scope a query to only include responses in a specific language.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $language
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLanguage($query, $language)
    {
        return $query->where('language', $language);
    }
}
