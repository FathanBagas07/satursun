<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'poster_id','title','description','deadline','location','status', 'budget_min', 'budget_max'
    ];

    public function poster(): BelongsTo
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function selection(): HasOne
    {
        return $this->hasOne(Selection::class, 'job_id');
    }

    public function isOpen(): bool     { return $this->status === 'open'; }
    public function isSelected(): bool { return $this->status === 'selected'; }
    public function isClosed(): bool   { return $this->status === 'closed'; }

    public function scopeOpen($q)     { return $q->where('status','open'); }
    public function scopeSelected($q) { return $q->where('status','selected'); }
    public function scopeClosed($q)   { return $q->where('status','closed'); }
}
