<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <-- Tambahkan ini
use App\Http\View\Composers\NotificationComposer; // <-- Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        View::composer('*', NotificationComposer::class);
    }
    
}
