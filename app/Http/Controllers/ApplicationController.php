<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Models\Application;
use App\Models\JobListing;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function store(Request $request, JobListing $jobListing)
    {
        $request->validate([
        'cv'   => 'required|file|mimes:pdf|max:2048',
        'note' => 'nullable|string|max:2000',
    ]);

        if ($jobListing->applications()->where('applicant_id', Auth::id())->exists()) {
            return redirect()->back()->withErrors(['cv' => 'Anda sudah pernah melamar untuk pekerjaan ini.']);
        }

        $path = $request->file('cv')->store('cvs', 'public');

        $jobListing->applications()->create([
            'applicant_id' => Auth::id(),
            'cv_path'      => $path,
            'note'         => $request->note,
            'status'       => 'in_review',
        ]);

        Notification::create([
            'user_id' => $jobListing->poster_id,
            'type'    => 'new_application',
            'message' => 'Lamaran baru dari ' . Auth::user()->name . ' untuk pekerjaan "' . $jobListing->title . '".',
        ]);

        return redirect()->route('freelancer.jobs.show', $jobListing)
            ->with('status', 'Lamaran Anda berhasil dikirim!');
    }

    /**
     * Poster mengubah status lamaran (diterima/ditolak).
     */

    public function updateStatus(Request $request, Application $application)
    {
        $data = $request->validate(['status' => ['required', 'in:in_review,accepted,rejected']]);

        $job = $application->jobListing;
        $newStatus = $data['status'];
        $currentStatus = $application->status;

        if ($newStatus === 'accepted') {
            $job->update(['status' => 'closed']);
        } 
        elseif ($newStatus === 'rejected' && $currentStatus === 'accepted') {
            $job->update(['status' => 'open']);
        }

        $application->update($data);
        $statusText = ($newStatus === 'accepted') ? 'diterima' : 'ditolak';

        $message = '';
        if ($newStatus === 'accepted') {
            $message = 'Selamat! Lamaran Anda untuk pekerjaan "' . $job->title . '" telah diterima.';
        } else {
            $message = 'Mohon maaf, lamaran Anda untuk pekerjaan "' . $job->title . '" ditolak.';
        }

        Notification::create([
            'user_id' => $application->applicant_id,
            'type'    => 'application_status_updated',
            'message' => $message,
        ]);

        return back()->with('status', 'Status pelamar berhasil diperbarui.');
    }

    /**
     * Menangani permintaan download CV.
     */
    public function downloadCv(Application $application)
    {
        if (!Storage::disk('public')->exists($application->cv_path)) {
            abort(404, 'File CV tidak ditemukan.');
        }

        return Storage::disk('public')->download($application->cv_path);
    }
}
