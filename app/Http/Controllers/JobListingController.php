<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $posterId = Auth::id();

        $query = JobListing::query()->where('poster_id', $posterId);

        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($status = $request->string('status')->toString()) {
            $query->where('status', $status); 
        }

        $jobs = $query->latest()->paginate(10)->withQueryString();

        return view('poster.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('poster.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'budget_min'  => ['nullable', 'numeric', 'min:0'],
            'budget_max'  => ['nullable', 'numeric', 'min:0', 'gte:budget_min'],
            'category'    => ['nullable', 'string', 'max:100'],
            'location'    => ['nullable', 'string', 'max:150'],
            'deadline'    => ['nullable', 'date'],
        ]);

        $job = new JobListing($validated);
        $job->poster_id = Auth::id();
        $job->status = 'open';
        $job->save();

        return redirect()->route('poster.jobs.index')
            ->with('status', 'Job berhasil diposting.');
    }


    public function edit(JobListing $jobListing)
    {
        $this->authorize('update', $jobListing);

        return view('poster.jobs.edit', ['job' => $jobListing]);
    }

    public function update(Request $request, JobListing $jobListing)
    {
        $this->authorize('update', $jobListing);

        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'budget_min'  => ['nullable', 'numeric', 'min:0'],
            'budget_max'  => ['nullable', 'numeric', 'min:0', 'gte:budget_min'],
            'category'    => ['nullable', 'string', 'max:100'],
            'location'    => ['nullable', 'string', 'max:150'],
            'deadline'    => ['nullable', 'date'],
        ]);

        $jobListing->update($validated);

        return redirect()->route('poster.jobs.index')
            ->with('status', 'Job berhasil diperbarui.');
    }

    public function updateStatus(Request $request, JobListing $jobListing)
    {
        $this->authorize('updateStatus', $jobListing);

        $data = $request->validate([
            'status' => ['required', 'in:open,paused,closed'],
        ]);

        $jobListing->update(['status' => $data['status']]);

        return back()->with('status', 'Status job diperbarui.');
    }

    public function applicants(JobListing $jobListing)
    {
        $this->authorize('viewApplicants', $jobListing);

        $applicants = $jobListing->applications()
            ->with('user.profile')
            ->orderByRaw("CASE status
                            WHEN 'in_review' THEN 1
                            WHEN 'accepted' THEN 2
                            WHEN 'rejected' THEN 3
                            ELSE 4
                          END")
            ->latest()
            ->paginate(20);

        foreach ($applicants as $application) {
            $application->user->load(['applications' => function ($query) {
                $query->where('status', 'accepted')->with('jobListing');
            }]);
        }

        return view('poster.jobs.applicants', compact('jobListing', 'applicants'));
    }

    public function destroy(JobListing $jobListing)
    {
        $this->authorize('delete', $jobListing);

        $jobListing->delete();

        return redirect()->route('poster.jobs.index')
            ->with('status', 'Job berhasil dihapus.');
    }

    public function publicIndex(Request $request) {
        $query = JobListing::query()->whereIn('status', ['open', 'closed']);

        $query->when($request->q, function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->q . '%')
                ->orWhere('description', 'like', '%' . $request->q . '%');
        });

        $query->when($request->location, function ($q) use ($request) {
            $q->where('location', 'like', '%' . $request->location . '%');
        });

        $query->when($request->category, function ($q) use ($request) {
            $q->where('category', $request->category);
        });

        $query->when($request->min_budget, function ($q) use ($request) {
            $q->where('budget', '>=', $request->min_budget);
        });

        $query->when($request->max_budget, function ($q) use ($request) {
            $q->where('budget', '<=', $request->max_budget);
        });

        $jobs = $query->orderByRaw("CASE status
                                        WHEN 'open' THEN 1
                                        WHEN 'closed' THEN 2
                                        ELSE 3
                                    END")
                     ->latest()
                     ->paginate(12)
                     ->withQueryString();

        return view('freelancer.jobs.browse', compact('jobs'));
    }

    public function showPublic(JobListing $jobListing)
    {

        if ($jobListing->status !== 'open' && !$jobListing->applications()->where('applicant_id', Auth::id())->exists()) {
            abort(404);
        }

        return view('freelancer.jobs.show', compact('jobListing'));
    }

    
}
