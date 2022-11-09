<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail,Hash,DB; 
use App\User;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\SMTP;

class ForgotPasswordController extends Controller 
{

    public function showLinkRequestForm() 
    {
        return view('passwords.email');
    }

    public function sendResetLinkEmail(Request $request) 
    {
        $user_data = User::where('email',$request->email)->where('status','=',1)->where('user_status','=',3)->first();

        if (empty($user_data)) 
        {
            return \Redirect::back()->withErrors(["Invalid email"]);
        } else {
            $token = Str::random(64);

            $data=[
                'email' =>$request->email,
                'token' =>$token,
                'created_at' =>date('Y-m-d H:i:s')
            ];

            DB::table('password_resets')->insert($data);

            $newdata = array('token' => $token, 'name'=>$user_data->name);
            
            Mail::send('emails.forgotpassword', $newdata, function($message) use ($request) {
                $message->to($request->email)
                    ->from('test.knptech@gmail.com')
                    ->subject("Password Reset");
            });

            return redirect()->back()->with('message', 'We have e-mailed your password reset link!');
        }
    }

 
}
