<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash,DB; 
use App\User;

class ResetPasswordController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function showResetForm(\Illuminate\Http\Request $request) {
        return view('passwords.reset')->with(['email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $email_data = DB::table('password_resets')->where('token', $request->token)->first();

        if(isset($email_data) && !empty($email_data)) {
        
            $user = User::where('email', $email_data->email)
                        ->update(['password' => Hash::make($request->password)]);

            return redirect()->route('password.success');
        }  else {
            return redirect()->back()->with('message', 'Reset password token has been Expired !');
        }
    }

    public function showResetSuccessForm() {
        return view('passwords.reset-success');
    }
}
