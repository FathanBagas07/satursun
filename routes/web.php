<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/landing-page');
})->name('landing-page');

Route::get('/sign-in', function () {
    return view('pages/sign-in');
})->name('sign-in');