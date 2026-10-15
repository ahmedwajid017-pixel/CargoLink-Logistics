<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $documents = $user->documents()
            ->latest()
            ->take(3)
            ->get();

        $unreadCount = $user->notifications()
            ->whereNull('read_at')
            ->count();

        return view('dashboard', compact(
            'user',
            'documents',
            'unreadCount'
        ));
    }
}

