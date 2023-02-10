<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash,DB; 
use App\User;

class ResetPasswordController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        
        $language_code = $request->language_code ? $request->language_code : 'he';
        if ($language_code == 'en') {
            $pwd_update = 'Password has been updated';
            $token_expire = 'Reset password token has been Expired!';
        }else if($language_code == 'he') {
            $pwd_update = 'הסיסמא עודכנה';
            $token_expire = 'פג תוקפו של הקוד לאיפוס הסיסמה!';
        }else if($language_code == 'ar') {
            $pwd_update ='تم تحديث كلمة المرور';
            $token_expire = 'انتهت صلاحية رمز إعادة تعيين كلمة المرور!';
        }

        $email_data = DB::table('password_resets')->where('token', $request->token)->first();
        if(isset($email_data) && !empty($email_data)) {
            $user = User::where('email', $email_data->email)
                      ->update(['password' => Hash::make($request->password)]);

            return response()->json([
                'success' => true,
                'message' => $pwd_update,
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $token_expire,
                'status' => 400,
            ]);
        }
    }

    public function showResetSuccessForm() {
        return view('passwords.reset-success');
    }
}
