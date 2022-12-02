<?php

namespace App\Http\Controllers\MerchantApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class DashboardController extends Controller 
{

    public function index() {
        $total_c = \App\ApplyCouponByMerchantApp::get()->count();

        return view('MerchantApp.dashboard.index')->with(
                        array(
                            "total_c" => $total_c,
                        )
        );
    }


    public function logout(Request $request) {
        $request->session()->flush();
        \Auth::logout();
        return redirect('/');
    }

}
