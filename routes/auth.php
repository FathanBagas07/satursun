<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', fn () => redirect()->route('auth.choose'))->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

// Login / Logout
Route::get('/login',  [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/sign-in', fn () => redirect()->route('login'))->name('sign-in-page');
Route::get('/sign-up', fn () => redirect()->route('auth.choose'))->name('sign-up-page');
