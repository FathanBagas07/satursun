<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;

class JobListingPolicy
{
    public function manage(User $user, JobListing $job): bool
    {
        return $user->id == $job->poster_id; 
    }
    
    public function viewApplicants(User $user, JobListing $job): bool
    {
        return $user->id === (int) $job->poster_id;
    }

    public function update(User $user, JobListing $job): bool
    {
        return $user->id === (int) $job->poster_id;
    }

    public function delete(User $user, JobListing $job): bool
    {
        return $user->id === (int) $job->poster_id;
    }

    public function updateStatus(User $user, JobListing $job): bool
    {
        return $user->id === (int) $job->poster_id;
    }
}


