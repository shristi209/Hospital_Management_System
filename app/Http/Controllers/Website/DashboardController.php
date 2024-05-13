<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('website.dashboard');
    }
    public function appointment()
    {
        return view('website.appointment.appointment');
    }
    public function departmentRequest(Request $request)
    {

    }
}
