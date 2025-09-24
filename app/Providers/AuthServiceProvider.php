<?php

namespace App\Providers;

use App\Models\JobListing;
use App\Models\Application;
use App\Policies\JobListingPolicy;
use App\Policies\ApplicationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     JobListing::class => JobListingPolicy::class,
    //     Application::class => ApplicationPolicy::class,
    // ];
    protected $policies = [
        \App\Models\JobListing::class => \App\Policies\JobListingPolicy::class,
        \App\Models\Application::class => \App\Policies\ApplicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
