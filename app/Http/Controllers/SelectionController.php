<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Selection;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class SelectionController extends Controller
{
    public function select(Application $application)
    {
        $this->authorize('selectWinner', $application);
        $job = $application->job;

        DB::transaction(function () use ($job, $application) {
            Selection::updateOrCreate(
                ['job_id' => $job->id],
                ['application_id' => $application->id, 'selected_at' => now()]
            );

            $job->update(['status' => 'selected']);

            $application->update(['status' => 'accepted']);
            $job->applications()->where('id','!=',$application->id)->update(['status' => 'rejected']);
        });

        Notification::create([
            'user_id' => $application->applicant_id,
            'type'    => 'application_selected',
            'message' => 'Anda terpilih untuk job "'.$job->title.'".',
        ]);

        foreach ($job->applications()->where('id','!=',$application->id)->pluck('applicant_id') as $uid) {
            Notification::create([
                'user_id' => $uid,
                'type'    => 'application_result',
                'message' => 'Maaf, anda tidak terpilih untuk "'.$job->title.'".',
            ]);
        }

        return back()->with('banner','Pemenang dipilih.');
    }
}
