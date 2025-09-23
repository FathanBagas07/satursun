<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $items = Notification::where('user_id', Auth::id())
            ->latest()->take(10)->get();
        return view('dashboard', ['notifications' => $items]);
    }

    public function markRead(Notification $notification)
    {
        abort_if($notification->user_id !== Auth::id(), 403);
        $notification->update(['is_read' => true]);
        return back()->with('banner', 'Notifikasi ditandai dibaca.');
    }

    public function destroy(Notification $notification)
    {
        if ($notification->user_id !== Auth::id()) {
            abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        $notification->delete();

        return back()->with('status', 'Notifikasi berhasil dihapus.');
    }

}
