<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('admin.auth.forgotpassword');
    }
    public function storePassword(Request $request)
    {
        $request->validate([
            'email'=> "required|email|exists:users",
        ]);

        $token = Str::random(length: 64);
        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
        ]);

        Mail::send("admin.auth.email", ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('forgotpassword');
    }
    public function resetPassword(Request $request, $id)
    {
        
    }

}
