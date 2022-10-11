<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller 
{

    public function index() {
        $total_client = User::where("status", 1)->where("user_status", 0)->get()->count();
        $total_merchant = User::where("status", 1)->where("user_status", 1)->get()->count();
        $total_subadmin = User::where("status", 1)->where("user_status", 4)->get()->count();
        $total_categories = \App\Category::where("status", 1)->get()->count();
        $total_categories = \App\Category::where("status", 1)->get()->count();
        $total_blog = \App\Blog::where("status", 1)->get()->count();
        $total_feed = \App\PublicFeed::where("status", 1)->get()->count();


        return view('dashboard.index')->with(
                        array(
                            "total_client" => $total_client,
                            "total_merchant" => $total_merchant,
                            "total_subadmin" => $total_subadmin,
                            "total_categories" => $total_categories,
                            "total_blog" => $total_blog,
                            "total_feed" => $total_feed,
                        )
        );
    }

    public function edit_profile() 
    {
        return view("dashboard.edit_profile")->with(array("user" => \Auth::user()));
    }

    public function update_profile(Request $request) 
    {
        $admin = \Auth::user();

        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            "email" => "email|unique:users,email,$admin->id,id|max:50",
        ]);

        $admin->first_name = $request->get("first_name");
        $admin->last_name = $request->get("last_name");
        $admin->email = $request->get("email");

        $added_user = $admin->update();
        
        if ($added_user) {
            return redirect()->route("dashboard")->with("success", "Your profile details update Successfully");
        } else {
            return back()->withInput();
        }
    }

   
    public function change_password() {
        return view("dashboard.change_password")->with(array("user" => \Auth::user()));
    }

    public function update_password(Request $request) 
    {
        $admin = \Auth::user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);


        if (!Hash::check($request->get("old_password"), $admin->password)) 
        {
            return back()->with('error', 'The old password does not match the current password');
        } else {

            $admin->password = Hash::make($request->get("new_password"));

            $added_user = $admin->update();

            if ($added_user) {
                return redirect()->route("dashboard")->with("success", "Password update Successfully");
            } else {
                return back()->withInput();
            }
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        \Auth::logout();
        return redirect('/');
    }

}
