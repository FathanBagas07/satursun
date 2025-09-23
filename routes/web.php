<?php

use Illuminate\Support\Facades\Route;

// landing page
Route::get('/', function () {
    return view('pages/landing');
})->name('landing-page');

// Sign-in page
Route::get('/sign-in', function () {
    return view('pages/auth');
})->name('sign-in-page');