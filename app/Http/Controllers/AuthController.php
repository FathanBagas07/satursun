<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:freelancer,client'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return match($user->role) {
            'freelancer' => redirect()->route('landing-page'),
            'client' => redirect()->route('landing-page'),
            default => redirect()->route('landing-page')
        };
    }
}
