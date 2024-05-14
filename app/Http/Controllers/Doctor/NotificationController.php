<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function markAllAsRead()
    {
        $user= Auth::user()->doctor->unreadNotifications->markAsRead();
        return back()->with('message', 'All notifications marked as read');
        
    }
}
