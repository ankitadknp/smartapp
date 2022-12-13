<?php

namespace App\Http\Controllers\MerchantApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash,Auth;

class DashboardController extends Controller 
{

    public function index() {

        $user = Auth::user();
        $total_c = \App\ApplyCouponByMerchantApp::leftJoin('coupon', function ($join) {
                        $join->on('apply_coupon_by_merchant.coupon_id', '=', 'coupon.coupon_id');
                    })
                    ->where('coupon.user_id',$user->id)->get()->count();

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
