<?php

namespace App\Http\Controllers\Website;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

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
    public function changeLang($locale, Request $request)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    public function feedbacks(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last__name' => 'required|string',
            'email' => 'required',
            'message' => 'required|string'
        ]);
        Feedback::create($validatedData);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

}
