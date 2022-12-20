<?php

namespace App\Http\Controllers\MerchantApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Coupon;
use App\ClientMyCoupon;
use App\ApplyCouponByMerchantApp;
use DB,Auth;
use App\Http\Controllers\API\NotificationController;

class CouponController extends Controller 
{
    public function index()
    {
        $user = Auth::user();
        return view('MerchantApp.coupon.index');

    }

    public function load_data_in_table(Request $request)
    {
        $user = Auth::user();

        $page = !empty($request->get('start')) ? $request->get('start') : 0;
        $rows = !empty($request->get('length')) ? $request->get('length') : 10;
        $draw = !empty($request->get('draw')) ? $request->get('draw') : 1;

        $sidx = !empty($request->get('order')[0]['column']) ? $request->get('order')[0]['column'] : 0;
        $sord = !empty($request->get('order')[0]['dir']) ? $request->get('order')[0]['dir'] : 'DESC';

        $email = !empty($request->get('email')) ? $request->get('email') : '';
        $coupon_code = !empty($request->get('coupon_code')) ? $request->get('coupon_code') : '';
        $location = !empty($request->get('location')) ? $request->get('location') : '';

        $sidx = 'apply_coupon_by_merchant.id';

        $list_query = ApplyCouponByMerchantApp::leftJoin('users', function ($join) {
            $join->on('users.id', '=', 'apply_coupon_by_merchant.user_id');
        })
        ->leftJoin('coupon', function ($join) {
            $join->on('coupon.coupon_id', '=', 'apply_coupon_by_merchant.coupon_id');
        })
        ->leftJoin('locations', function ($join) {
            $join->on('coupon.location_id', '=', 'locations.id');
        })
        ->select('users.email','coupon.coupon_code','coupon.user_id','locations.city_area',DB::raw('DATE_FORMAT(apply_coupon_by_merchant.created_at, "%Y-%m-%d %H:%i:%s") as redeem_date'))
        ->where('coupon.user_id',$user->id);
   

        if (!empty($email)) {
            $list_query = $list_query->where('email', 'LIKE', '%'.$email.'%');
        }

        if (!empty($coupon_code)) {
            $list_query = $list_query->where('coupon_code', 'LIKE', '%'.$coupon_code.'%');
        }
        
        if (!empty($location)) {
            $list_query = $list_query->where('city_area', 'LIKE', '%'.$location.'%');
        }


        $total_rows = $list_query->count();
        $all_records = array();

        if ($total_rows > 0) {
            $list_of_all_data = $list_query->skip($page)
                ->orderBy($sidx, $sord)
                ->take($rows)
                ->get();
            
            $index = 0;

            foreach ($list_of_all_data as $value) {
                $all_records[$index]['email'] = $value->email;
                $all_records[$index]['coupon_code'] = $value->coupon_code;
                $all_records[$index]['city_area'] = $value->city_area;
                $all_records[$index]['created_at'] = $value->redeem_date;

                ++$index;
            }
        }
        $response = [];
        $response['draw'] = (int) $draw;
        $response['recordsTotal'] = (int) $total_rows;
        $response['recordsFiltered'] = (int) $total_rows;
        $response['data'] = $all_records;

        return $response;
    }

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
                // ->limit(10)
                ->get();

   
        return response()->json($data);
    }

    public function autocomplete_coupon(Request $request)
    {
        $user = Auth::user();
        $data = Coupon::select("coupon_id","coupon_code as value")
                ->where('coupon_code', 'LIKE', '%'. $request->get('search'). '%')
                ->where('user_id',$user->id)
                // ->limit(10)
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

                        $client_mylist = ClientMyCoupon::where('coupon_id',$request->get('coupon_id'))->where('user_id',$request->get('user_id'))->first();

                        if ( !empty ($client_mylist) ) {
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
                            return redirect()->route('merchantapp.coupon_redeem.index')->with('success','Coupon Redeem Successfully');
                        } else {
                            return redirect()->back()->withInput()->withErrors(['coupon'=> "This coupon has not been added to this user's my list of coupons"]);
                        }
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