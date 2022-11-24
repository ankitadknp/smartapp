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
                $user_roles_data = $user->getUserRole;
                if (!empty($user_roles_data)) {
                    $role_permissions = json_decode($user_roles_data->role_permissions, true);
                    $role_types_ids = array();

                    foreach ($role_permissions as $key => $value) {
                        $role_types_ids[] = $key;
                    }
                    
                    //GET USER PERMISSION
                    $get_all_permissions_controller_names = \App\UserRolePermission::whereIn("id", $role_types_ids)
                    ->select("id", "controller_name")
                    ->get();
                    $role_permissions_array = array();
                    foreach ($get_all_permissions_controller_names as $sinlge_value) {
                        $role_permissions_array[$sinlge_value->controller_name] = $role_permissions[$sinlge_value->id];
                    }
                    $request->session()->put("user_access_permission", $role_permissions_array);
                }
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
