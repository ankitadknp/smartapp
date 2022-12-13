<?php

namespace App\Http\Controllers\MerchantApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Coupon;
use App\ApplyCouponByMerchantApp;
use DB,Auth;
use App\Http\Controllers\API\NotificationController;

class CouponController extends Controller 
{
    public function create() {
        $apply_coupon_res = ApplyCouponByMerchantApp::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'apply_coupon_by_merchant.user_id');
                        })
                        ->leftJoin('coupon', function ($join) {
                            $join->on('coupon.coupon_id', '=', 'apply_coupon_by_merchant.coupon_id');
                        })
                        ->select('users.email','coupon.coupon_code')
                        ->orderby('apply_coupon_by_merchant.id','DESC')
                        ->first();
        return view('MerchantApp.coupon.add')->with(['apply_coupon_res'=>$apply_coupon_res]);
    }

    public function autocomplete_user(Request $request)
    {
        
        $data = User::select("id", DB::raw("CONCAT(first_name, ' ', last_name) as name"),"email as value")
                ->where('email', 'LIKE', '%'. $request->get('search'). '%')
                ->where('user_status',0)
                ->where('status',1)
                ->limit(10)
                ->get();

   
        return response()->json($data);
    }

    public function autocomplete_coupon(Request $request)
    {
        $user = Auth::user();
        $data = Coupon::select("coupon_id","coupon_code as value")
                ->where('coupon_code', 'LIKE', '%'. $request->get('search'). '%')
                ->where('user_id',$user->id)
                ->limit(10)
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
            'user.required' => 'Please enter user email',
            'coupon.required' => 'Please enter coupon code'
        ]);

        $userRes =  User::where('id',$request->get('user_id'))->first();
        if ( !empty($userRes) ) {

            $couponRes = Coupon::where('coupon_id',$request->get('coupon_id'))->first();

            if ( !empty($couponRes) ) {

                $added_coupon = ApplyCouponByMerchantApp::where('coupon_id',$request->get('coupon_id'))->where('user_id',$request->get('user_id'))->first();

                if ( empty($added_coupon) ) {
                        $coupon_expired = Coupon::where('coupon_id',$request->get('coupon_id'))
                            ->whereDate('coupon.expiry_date', '<', $currentDate)
                            ->first();

                    if ( !empty ($coupon_expired) ) {

                        return redirect()->back()->withInput()->withErrors(['coupon'=> 'Coupon has been expired']);

                    } else {
                        $added = [
                            'user_id' => $request->get('user_id'),
                            'coupon_id' => $request->get('coupon_id'),
                        ];

                        $added = ApplyCouponByMerchantApp::create($added);

                        if ($added) 
                        {
                            // send notification
                            $user_device = DB::table('user_device')->leftJoin('users', function($join) {
                                $join->on('users.id', '=', 'user_device.user_id');
                                })
                                ->where('user_device.user_id',$request->get('user_id'))
                                ->where('users.status',1)
                                ->where('users.is_verified_mobile_no',1)
                                ->first();

                            if ( !empty($user_device) ) {
                                $notification_controller = new NotificationController();
                                $msgVal  = $couponRes->coupon_code." Coupon has been redeemed";
                                $title = 'The Coupon has been redeemed';
                                $type = 3;
                                $u_id = $request->get('user_id');
                                $device_token = $user_device->device_token;
                                $notification_controller->add_notification($msgVal,$title,$u_id,$type);
                                $notification_controller->send_notification($msgVal,$device_token,$title);
                            }
                        }
                        return redirect()->back()->with('success','Coupon Redeem Successfully');
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