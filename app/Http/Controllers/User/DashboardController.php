<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    public function appointment()
    {
        return view('user.appointment.appointment');
    }
    public function departmentRequest(Request $request)
    {
        
    }
}