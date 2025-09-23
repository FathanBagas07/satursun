<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Application;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;
        
        $applications = [];
        if ($user->isFreelancer()) {
            $applications = Application::where('applicant_id', $user->id)
                ->with('jobListing') 
                ->latest()
                ->get();
        }

        return view('pages.profile-edit', compact('user', 'profile', 'applications'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'last_education' => ['required', 'string', 'max:100'],
            'phone'         => ['required', 'string', 'max:20'],
            'bio'           => ['nullable', 'string', 'max:1000'],
            'hard_skills'   => ['nullable', 'string', 'max:1000'],
            'soft_skills'   => ['nullable', 'string', 'max:1000'],
            'photo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $user->update(['name' => $validated['name']]);

        $hard = array_values(array_filter(array_map('trim', explode(',', $validated['hard_skills'] ?? ''))));
        $soft = array_values(array_filter(array_map('trim', explode(',', $validated['soft_skills'] ?? ''))));

        $profile = $user->profile()->firstOrNew([]);

        $profile->last_education = $validated['last_education'];
        if (array_key_exists('phone', $validated)) $profile->phone = $validated['phone'];
        if (array_key_exists('bio', $validated))   $profile->bio   = $validated['bio'];

        $profile->hard_skills = $hard;
        $profile->soft_skills = $soft;

        if ($request->hasFile('photo')) {

            if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }
            $profile->photo = $request->file('photo')->store('avatars', 'public');
        }

        $profile->save();

        return redirect()->route('landing')->with('status', 'Profil berhasil diperbarui.');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
