<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class LoginController extends Controller {

    protected $adminModel;

    public function __construct() {
        $this->adminModel = new \App\User();

        $this->middleware('guest')->except('logout');
    }

    public function index() {
    

        if (\Auth::check()) {
            return redirect('dashboard');
        } else {
            return view("login");
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $email = $request->get("email");
        $password = $request->get("password");

        if(Auth::attempt(['email' => $email, 'password' => ($password),'user_status' => [3,4]]))
        { 
          
            $user = User::where('email',$email)->whereIn('user_status',[3,4])->first();
            if ($user->status == 1)
            { 
                return redirect('dashboard');
            } else if ($user->status == 2)
            {
                Auth::logout();
                return redirect('/')->withErrors('Your account is not activated. Please activate it first.');
            }
        }

        return \Redirect::back()->withErrors(["Invalid email or password"]);
    }

    public function demo() 
    {
        return view("demo");
    }

}
