<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function __construct(User $user, DB $db, Mail $mail){
        $this->user = $user;
        $this->db=$db;
        $this->mail=$mail;
    }
    public function forgotPassword()
    {
        return view('admin.auth.forgotpassword');
    }
    public function storePassword(Request $request)
    {
        try
        {
            $this->db->beginTransaction();

            $request->validate([
                'email'=> "required|email|exists:users",
            ]);

            $token = Str::random(length: 64);
            $this->db->table('password_reset_tokens')->insert([
                'email'=>$request->email,
                'token'=>$token,
            ]);

            $this->mail->send("admin.auth.email", ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            $this->db->commit();
            return redirect()->route('forgotpassword')->with('message', 'Email Sent Successfully!!!');
        }catch(\Exception $e){
            $this->db->rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
    }

    public function resetPassword($token)
    {
        return view('admin.auth.newpassword', compact('token'));
    }
    public function resetPasswordPost(Request $request)
    {
        // dd($request);
        $request->validate([
            "email"=>"required|email|exists:users",
            "password"=>"required|min:4|confirmed",
        ]);

        $updatepassword=$this->db->table('password_reset_tokens')->where([
            "email"=>$request->email,
            "token"=>$request->token,
            ])->first();

            if (!$updatepassword) {
                return redirect()->to(route("resetpassword"))->with('error', 'Invalid User');
            }
            $this->user->where("email" , $request->email)->update(["password"=>Hash::make($request->password)]);

        $this->db->table('password_reset_tokens')->where([
            'email'=>$request->email,
        ])->delete();

        return redirect()->to(route('login-user'))->with("message", 'Sucessfully Changed Password!!!');

    }
}
