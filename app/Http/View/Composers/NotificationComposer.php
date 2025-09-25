<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $notifications = Notification::where('user_id', Auth::id())
                ->where('is_read', false)
                ->latest()
                ->take(5)
                ->get();
            
            $view->with('unreadNotifications', $notifications);
        }
    }
}