<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthCheckMiddleware
{
    public function handle($request, Closure $next)
    {
        // || USER IS LOGGED IN ||
        if (Auth::check()) {
            $role = Auth::user()->role;

            if (
                $request->routeIs(
                    'auth.sign-in-form',
                    'auth.sign-up-role',
                    'auth.sign-up-freelancer',
                    'auth.sign-up-client'
                )
            ) {
                return match ($role) {
                    'client' => redirect()->route('client.dashboard'),
                    'freelancer' => redirect()->route('freelancer.dashboard'),
                    default => redirect()->route('landing-page'),
                };
            }
        }

        // || USER IS NOT LOGGED IN ||
        if(!Auth::check()) {
            if (!$request->routeIs(
                'auth.sign-in-form',
                'auth.sign-up-role',
            )) {
                return redirect()->route('auth.sign-in-form');
            }
        }

        return $next($request);
    }   
}