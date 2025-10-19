<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    JobListingController,
    ApplicationController,
    SelectionController,
    ProfileController,
    NotificationController,
    AuthController
};

/* PUBLIC */
Route::view('/', 'pages.landing')->name('landing-page');
Route::redirect('/auth', '/auth/sign-up-role');
Route::prefix('auth')->name('auth.')->group(function () {
    // ========= VIEW AUTH PAGES =========
    Route::get('sign-in', function () {
        return view('pages.auth', ['page' => 'sign-in-form']);
    })->name('sign-in-form');

    Route::get('sign-up-role', function () {
        return view('pages.auth', ['page' => 'sign-up-role']);
    })->name('sign-up-role');

    Route::get('sign-up/freelancer', function () {
        return view('pages.auth', [
            'page' => 'sign-up-form',
            'presetRole' => 'freelancer'
        ]);
    })->name('sign-up-freelancer');

    Route::get('sign-up/client', function () {
        return view('pages.auth', [
            'page' => 'sign-up-form',
            'presetRole' => 'client'
        ]);
    })->name('sign-up-client');

    // ========= ACTION AUTH =========
    Route::post('sign-up', [AuthController::class, 'store'])->name('sign-up-action');
});


/* AUTHENTICATED */

// Route::middleware('auth')->group(function () {
//     Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::put('profile',      [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

//     // Poster (Admin UI)
//     Route::middleware(['auth', 'role:poster'])
//         ->prefix('poster')
//         ->name('poster.')
//         ->group(function () {

//             // CRUD Job
//             Route::get('jobs',                   [JobListingController::class, 'index'])->name('jobs.index');
//             Route::get('jobs/create',            [JobListingController::class, 'create'])->name('jobs.create');
//             Route::post('jobs',                  [JobListingController::class, 'store'])->name('jobs.store');
//             Route::get('jobs/{jobListing}/edit', [JobListingController::class, 'edit'])->name('jobs.edit');
//             Route::patch('jobs/{jobListing}',    [JobListingController::class, 'update'])->name('jobs.update');
//             Route::delete('jobs/{jobListing}',   [JobListingController::class, 'destroy'])->name('jobs.destroy');
//             Route::patch('jobs/{jobListing}/status', [JobListingController::class, 'updateStatus'])->name('jobs.status');

//             // Pelamar
//             Route::get('jobs/{jobListing}/applicants', [JobListingController::class, 'applicants'])->name('jobs.applicants');

//             // Terima/Tolak pelamar
//             Route::patch('applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.status');
//             Route::get('applications/{application}/cv', [ApplicationController::class, 'downloadCv'])->name('applications.cv');
//         });

//     // Freelancer (Client UI)
//     Route::middleware('role:freelancer')->name('freelancer.')->group(function () {
//         Route::get('browse-jobs', [JobListingController::class, 'publicIndex'])->name('jobs.browse');
//         Route::get('jobs/{jobListing}', [JobListingController::class, 'showPublic'])->name('jobs.show');
//         Route::post('jobs/{jobListing}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');
//         Route::get('applications/{application}/cv', [ApplicationController::class, 'downloadCv'])->name('applications.cv');
//     });
// });

// if (file_exists(__DIR__ . '/auth.php')) {
//     require __DIR__ . '/auth.php';
// }
