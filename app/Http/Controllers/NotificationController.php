<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = $request->user()
            ->notifications()
            ->latest()
            ->get();

        return view('notifications.index', compact('notifications'));
    }

    public function markRead(Request $request, Notification $notification)
    {
        $userNotification = $request->user()
            ->notifications()
            ->findOrFail($notification->id);

        $userNotification->update([
            'read_at' => now(),
        ]);

        return redirect()->route('notifications.index');
    }
}

