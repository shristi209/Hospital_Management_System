<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function markAllAsRead()
    {
        if (Auth::user()->hasRole('super-admin')) {
            Auth::user()->unreadNotifications->markAsRead();
        }
        if(Auth::user()->doctor)
        {
            Auth::user()->doctor->unreadNotifications->markAsRead();
        }
        return back()->with('message', 'All notifications marked as read');
    }

}
