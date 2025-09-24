<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id','photo','phone','last_education','bio',
        'skills','hard_skills','soft_skills','links'
    ];

    protected $casts = [
        'skills'      => 'array',
        'hard_skills' => 'array',
        'soft_skills' => 'array',
        'links'       => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
