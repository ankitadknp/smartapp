<?php

namespace App\Http\Controllers\MerchantApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Coupon;
use App\ApplyCouponByMerchantApp;
use DB;

class CouponController extends Controller 
{
    public function create() {
        return view('MerchantApp.coupon.add');
    }

    public function autocomplete_user(Request $request)
    {
        $data = User::select("id", DB::raw("CONCAT(first_name, ' ', last_name) as name"),"email as value")
                ->where('email', 'LIKE', '%'. $request->get('search'). '%')
                ->where('user_status',0)
                ->where('status',1)
                ->get();

   
        return response()->json($data);
    }

    public function autocomplete_coupon(Request $request)
    {
        $data = Coupon::select("coupon_id","coupon_code as value")
                ->where('coupon_code', 'LIKE', '%'. $request->get('search'). '%')
                ->groupBy('coupon_code')
                ->get();

   
        return response()->json($data);
    }

    public function store(Request $request) {

        $currentDate = date('Y-m-d');

        $request->validate([
            'user' => 'required',
            'coupon' => 'required',
        ],
        [
            'user.required' => 'Please select a user from the dropdown menu',
            'coupon.required' => 'Please select a coupon from the dropdown menu'
        ]);

        $userRes =  User::where('id',$request->get('user_id'))->first();
        if ( !empty($userRes) ) {

        $couponRes = Coupon::where('coupon_id',$request->get('coupon_id'))->first();

        if ( !empty($couponRes) ) {

                $added_coupon = ApplyCouponByMerchantApp::where('coupon_id',$request->get('coupon_id'))->first();

                if ( empty($added_coupon) ) {
                    $coupon_expired = ApplyCouponByMerchantApp::leftJoin('coupon', function ($join) {
                                $join->on('coupon.coupon_id', '=', 'apply_coupon_by_merchant.coupon_id');
                            })
                            ->whereDate('coupon.expiry_date', '<', $currentDate)
                            ->first();

                    if ( !empty ($coupon_expired) ) {

                        return redirect()->back()->withInput()->withErrors(['coupon'=> 'Coupon has been expired']);

                    } else {
                        $added = [
                            'user_id' => $request->get('user_id'),
                            'coupon_id' => $request->get('coupon_id'),
                        ];

                        ApplyCouponByMerchantApp::create($added);
                        return redirect()->back()->with('success','Apply Coupon Successfully');
                    }
                } else {
                    return redirect()->back()->withInput()->withErrors(['coupon'=> 'Coupon has been already applied']);
                }
            } else {
                return redirect()->back()->withInput()->withErrors(['coupon'=> 'Please select a coupon from the dropdown menu']);
            }

        } else {
            return redirect()->back()->withInput()->withErrors(['user'=> 'Please select a user from the dropdown menu']);
        }
    }
}