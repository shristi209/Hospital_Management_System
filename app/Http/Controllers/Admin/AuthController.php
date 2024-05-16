<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginValidationRequest;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function loginUser(LoginValidationRequest $request)
    {
        $credential = $request->only('email', 'password');
        if(Auth::attempt($credential)){
            return redirect('dashboard');
        }
        else{
            return back()->with('fail','Enter Valid Email or Password');
            return redirect('login');
        }
    }

    public function logoutUser()
    {
        Auth::logout();

        return redirect('login');
    }
}



