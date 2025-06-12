<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    protected $fillable = ['intent_id', 'pattern','language'];

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
     * Get the intent associated with the pattern.
     */
    public function intent()
    {
        return $this->belongsTo(Intent::class);
    }

    /**
     * Get the pattern in a formatted way.
     *
     * @return array
     */
    public function getFormattedPattern(): array
    {
        return [
            'id' => $this->id,
            'intent_id' => $this->intent_id,
            'pattern' => $this->pattern,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
