<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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

        $title =  Config::get('constants.TITLE');
        $user_data = User::where('email',$request->email)->where('status','=',1)->whereIn('user_status',[3,4])->first();

        if (empty($user_data)) 
        {
            return \Redirect::back()->withErrors(["Invalid email"]);
        } else {
            //$token = Str::random(6);
            $token = random_int(0, 999999);
            //$token = Str::random(64);
            $data=[
                'email' =>$request->email,
                'token' =>$token,
                'created_at' =>date('Y-m-d H:i:s')
            ];

            DB::table('password_resets')->insert($data);
            $language_code = $request->language_code ? $request->language_code : 'en';
            $newdata = array('token' => $token, 'name'=>$user_data->name, 'language_code' => $language_code);
            if($language_code == 'ar') {
                $subject = "عادة تعيين كلمة المرور الخاصة بك - لمقيم ذكي";
            } else if($language_code == 'he') {
                $subject = "תושב חכם - אפס סיסמא";
            } else {
                $subject = "Reset your password - $title";
            }

            $env_email = env('MAIL_USERNAME');
            
            Mail::send('emails.forgotpassword', $newdata, function($message) use ($request, $subject) {
                $message->to($request->email)
                    ->from('support@toshavhaham.co.il', 'Support -Toshav Haham')
                    ->subject($subject);
            });

            return redirect()->route('password.reset_password')->with('message', 'We have sent you One Time Password (OTP) to your registered email address! If you have not received an email please check your Spam or Junk mail folder.');
        }
    }
}
