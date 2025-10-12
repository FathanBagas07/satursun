<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'photo',
    'bio'
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // public function profile(): HasOne
    // {
    //     return $this->hasOne(Profile::class);
    // }

    // public function postedJobs(): HasMany
    // {
    //     return $this->hasMany(JobListing::class, 'poster_id');
    // }

    // public function applications(): HasMany
    // {
    //     return $this->hasMany(Application::class, 'applicant_id');
    // }

    // public function notifications(): HasMany
    // {
    //     return $this->hasMany(Notification::class);
    // }

    // public function isPoster(): bool      { return $this->role === 'poster'; }      
    // public function isFreelancer(): bool  { return $this->role === 'freelancer'; }  

    // public function scopePoster($q)     { return $q->where('role','poster'); }
    // public function scopeFreelancer($q) { return $q->where('role','freelancer'); }
}
