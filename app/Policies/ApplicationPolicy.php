<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;

class ApplicationPolicy
{
    // public function updateStatus(User $user, Application $app): bool
    // {
    //     return $user->id === $app->job->poster_id; // poster pemilik job
    // }

    public function viewCv(User $user, Application $app): bool
    {
        return $user->id === $app->applicant_id || $user->id === $app->job->poster_id;
    }

    public function selectWinner(User $user, Application $app): bool
    {
        return $user->id === $app->job->poster_id;
    }
    public function updateStatus(User $user, Application $app): bool
    {
        return $user->id === (int) $app->jobListing->poster_id;
    }

    public function select(User $user, Application $app): bool
    {
        return $user->id === (int) $app->jobListing->poster_id;
    }
}
