<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
    protected $fillable = [
        'job_id','applicant_id','note','cv_path','status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function joblisting(): BelongsTo
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function selection(): HasOne
    {
        return $this->hasOne(Selection::class, 'application_id');
    }

    public function inReview(): bool  { return $this->status === 'in_review'; }
    public function accepted(): bool  { return $this->status === 'accepted'; }
    public function rejected(): bool  { return $this->status === 'rejected'; }

    public function scopeInReview($q) { return $q->where('status','in_review'); }
    public function scopeAccepted($q) { return $q->where('status','accepted'); }
    public function scopeRejected($q) { return $q->where('status','rejected'); }
}
