<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\ClientMyCoupon;
use App\Coupon;
use App\CouponQRcode;
use App\CouponTerm;
use App\Http\Controllers\Controller;
use App\Share;
use App\UseCoupon;
use App\User;
use App\Location;
use DB,QrCode,URL,Validator,File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\NotificationController;

class CouponController extends Controller
{
    public function add_coupon(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required|max:20',
            'discount_amount' => 'required',
            'discount_type' => 'required',
            'location_id' => 'required',
            'expiry_date' => 'required',
            'term_condition' => 'required',
            'coupon_title' => 'required|max:50',
            'coupon_description' => 'required',
            'category_id' => 'required',
            'qrcode_url' => 'required|url',
            'coupon_title_ab' => 'required',
            'coupon_title_he' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }
        $input = $request->all();
        $input['user_id'] = $user_id;
        $couponRes = Coupon::create($input);

        $publicPath = public_path('qrcodes/'.time().'.svg');
        $fileName = basename($publicPath);
        $basePath = URL::to('/public/qrcodes/'.$fileName);

        if ($couponRes->coupon_id) {
            QrCode::generate($request->qrcode_url, $publicPath);
            $QrRes = CouponQRcode::create([
                'coupon_id' => $couponRes->coupon_id,
                'qrcode_url' => $request->qrcode_url,
                'qrcode_file' => $basePath,
            ]);

            $term = json_decode($request->term_condition);
            foreach ($term as $val)
            {
                CouponTerm::create([
                    'coupon_id' => $couponRes->coupon_id,
                    'term_condition' => $val,
                ]);
            }
        }

        $notification_controller = new NotificationController();
        $msgVal  = "Coupon is Active";
        $device_token = '11';
        $notification_controller->send_notification($msgVal,$device_token);

        return response()->json([
            'success' => true,
            'data' => $couponRes,
            'message' => 'Added Coupon Successfully',
            'status' => 200,
        ]);
    }

    public function coupon_list(Request $request)
    {
        $user_id = Auth::user()->id;
        $search = $request->search;
        $location = $request->location;
        $discount_type = $request->discount_type;
        $category_id = $request->category_id;

        $user = User::find($user_id);

        $coupon = Coupon::select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                ->leftJoin('users', function ($join) {
                    $join->on('users.id', '=', 'coupon.user_id');
                })
                ->leftJoin('coupon_qrcode', function ($join) {
                    $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                })
                ->where(function ($query) use ($search,$location,$discount_type,$category_id) { 
                    if (!empty($search)) {
                        $query->where('coupon.coupon_code', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.coupon_title', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.coupon_title_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.coupon_title_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.location', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.discount_type', 'LIKE', '%'.$search.'%');
                    }
                    if ( !empty($location) ) {
                        $query->where('coupon.location', 'LIKE', '%'.$location.'%');
                    }
                    if ( !empty($discount_type) ) {
                        $query->where('coupon.discount_type', 'LIKE', '%'.$discount_type.'%');
                    }
                    if ( !empty($category_id) ) {
                        $query->where('coupon.category_id', $category_id);
                    }
                })
                ->where(function ($query) use ($user,$user_id) { 
                    if ($user->user_status == 1) {
                        $query->where('coupon.user_id',$user_id);
                    }
                })
                ->orderby('coupon.coupon_id', 'DESC')
                ->get();
        

        foreach ($coupon as $key=>$val)
        {
            $term = [];

            $coupon_id = $val->coupon_id;
            $termcon = CouponTerm::where('coupon_id',$coupon_id)->get();
            $term_count = CouponTerm::where('coupon_id',$coupon_id)->count();

            for ($i=0; $i<count($termcon); $i++) 
            {
                $value = $termcon[$i]->term_condition;
                array_push($term,$value);
            }
            $coupon[$key]['term_condition'] = $term;
        }


        return response()->json([
            'success' => true,
            'data' => $coupon,
            'message' => 'Coupon List',
            'status' => 200,
        ]);
    }

    public function update_coupon(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'coupon_id' => 'required',
            'coupon_code' => 'required|max:20',
            'discount_amount' => 'required',
            'discount_type' => 'required',
            'location_id' => 'required',
            'expiry_date' => 'required',
            'term_condition' => 'required',
            'category_id' => 'required',
            'coupon_title_ab' => 'required',
            'coupon_title_he' => 'required',
            'qrcode_url' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $input = $request->all();

        $coupon = Coupon::find($request->coupon_id);

        if ( !empty($request->qrcode_url)) {

            $publicPath = public_path('qrcodes/'.time().'.svg');
            $fileName = basename($publicPath);
            $basePath = URL::to('/public/qrcodes/'.$fileName);

            QrCode::generate($request->qrcode_url, $publicPath);
            $QrRes = CouponQRcode::where('coupon_id',$request->coupon_id)->update([
                'qrcode_url' => $request->qrcode_url,
                'qrcode_file' => $basePath,
            ]);
        } 

        if (!empty($request->term_condition)) 
        {
            CouponTerm::where('coupon_id',$request->coupon_id)->delete();

            $term = json_decode($request->term_condition);

            foreach ($term as $val)
            {
                CouponTerm::create([
                    'coupon_id' => $request->coupon_id,
                    'term_condition' => $val,
                ]);
            }
        }

        $coupon->update($input);

        $success['coupon_id'] = $coupon->coupon_id;
        $success['coupon_code'] = $coupon->coupon_code;
        $success['discount_amount'] = $coupon->discount_amount;
        $success['discount_type'] = $coupon->discount_type;
        $success['location'] = $coupon->location;
        $success['expiry_date'] = $coupon->expiry_date;
        $success['category_id'] = $coupon->category_id;
        $success['coupon_title_ab'] = $coupon->coupon_title_ab;
        $success['coupon_title_he'] = $coupon->coupon_title_he;

        return response()->json([
            'success' => true,
            'data' => $success,
            'message' => 'Update Coupon Successfully',
            'status' => 200,
        ]);
    }

    public function add_mycoupon(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'coupon_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $added_coupon = ClientMyCoupon::where('user_id', $user_id)->where('coupon_id', $request->coupon_id)->first();


        $input = $request->all();
        $input['user_id'] = $user_id;

        if ( empty($added_coupon) || !isset($added_coupon)) 
        {
            ClientMyCoupon::create($input);
            $msg = 'Added Coupon in mycoupon list';
        } else {
            $msg = 'Coupon already added';
        }

        return response()->json([
            'success' => true,
            'message' => $msg,
            'status' => 200,
        ]);
    }

    public function client_mycoupon_list(Request $request)
    {
        $user_id = Auth::user()->id;
        $currentDate = date('Y-m-d');

        $active_coupon_list = ClientMyCoupon::leftJoin('coupon', function ($join) {
                        $join->on('coupon.coupon_id', '=', 'client_my_coupon.coupon_id');
                    })
                    ->leftJoin('users', function ($join) {
                        $join->on('users.id', '=', 'coupon.user_id');
                    })
                    ->select('coupon.*', 'users.business_logo')
                    ->where('client_my_coupon.user_id', $user_id)
                    ->whereDate('coupon.expiry_date', '>=', $currentDate)
                    ->orderby('client_my_coupon.client_my_coupon_id','DESC')
                    ->get();

        $inactive_coupon_list = ClientMyCoupon::leftJoin('coupon', function ($join) {
                        $join->on('coupon.coupon_id', '=', 'client_my_coupon.coupon_id');
                    })
                    ->leftJoin('users', function ($join) {
                        $join->on('users.id', '=', 'coupon.user_id');
                    })
                    ->select('coupon.*', 'users.business_logo')
                    ->where('client_my_coupon.user_id', $user_id)
                    ->whereDate('coupon.expiry_date', '<', $currentDate)
                    ->orderby('client_my_coupon.client_my_coupon_id','DESC')
                    ->get();

        return response()->json([
            'success' => true,
            'active_coupon_list' => $active_coupon_list,
            'inactive_coupon_list' => $inactive_coupon_list,
            'message' => 'My Coupon List',
            'status' => 200,
        ]);
    }

    public function coupon_statistics(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'coupon_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $coupon = Coupon::find($request->coupon_id);

        if ( !empty($coupon) ) {
            $total_coupon = Coupon::where('user_id',$user_id)->count();
            $total_add = ClientMyCoupon::where('coupon_id', $request->coupon_id)->count();
            $total_use = UseCoupon::where('coupon_id', $request->coupon_id)->count();
            $total_share = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->count();
            $total_email = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->where('share_by', 1)->count();
            $total_whatsapp = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->where('share_by', 0)->count();

            $success['coupon_id'] = $coupon->coupon_id;
            $success['coupon_code'] = $coupon->coupon_code;
            $success['discount_amount'] = $coupon->discount_amount;
            $success['discount_type'] = $coupon->discount_type;
            $success['location'] = $coupon->location;
            $success['expiry_date'] = $coupon->expiry_date;
            $success['term_condition'] = $coupon->term_condition;
            $success['total_coupon'] = $total_coupon;
            $success['total_added_by'] = $total_add;
            $success['total_used_by'] = $total_use;
            $success['total_share'] = $total_share;
            $success['total_whatsapp'] = $total_whatsapp;
            $success['total_email'] = $total_email;
            $success['created_at'] = $coupon->created_at;

            return response()->json([
                'success' => true,
                'data' => $success,
                'message' => 'Coupon Statistics',
                'status' => 200,
            ]);
        } else {
            
            return response()->json([
                'success' => false,
                'message' => 'Coupon id not found',
                'status' => 400,
            ]);
        }
    }

    public function save_coupon(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'coupon_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $usecoupon = UseCoupon::where('user_id', $user_id)->where('coupon_id', $request->coupon_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ( empty($usecoupon) || !isset($usecoupon)) {
            UseCoupon::create($input);
            $msg = 'Saved Coupon';
        } else {
            $msg = 'Coupon already saved';
        }

        return response()->json([
            'success' => true,
            'message' => $msg,
            'status' => 200,
        ]);
    }

    public function coupon_category_list(Request $request)
    {
        $coupon_res = Category::where('type', '=', 'Coupon')->get();

        return response()->json([
            'success' => true,
            'data' => $coupon_res,
            'message' => 'Coupon Category List',
            'status' => 200,
        ]);
    }

    public function delete_coupon(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            'coupon_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $mycoupon = ClientMyCoupon::where('coupon_id',$request->coupon_id)->get();
        $qrcode = CouponQRcode::where('coupon_id',$request->coupon_id)->get();
        $usecoupon = UseCoupon::where('coupon_id',$request->coupon_id)->get();
        $share = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->get();
        $term = CouponTerm::where('coupon_id',$request->coupon_id)->get();

        if (!empty($mycoupon)) 
        {
            ClientMyCoupon::where('coupon_id',$request->coupon_id)->delete();
        }
        if (!empty($qrcode)) 
        {
            foreach ($qrcode as $img_val) 
            {
                $destinationPath = public_path("/");
                $new_path = substr($img_val->qrcode_file, strpos($img_val->qrcode_file, "qrcodes/") );  
                $image_path = $destinationPath.$new_path;
        
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
            }
            CouponQRcode::where('coupon_id',$request->coupon_id)->delete();
        }
        if (!empty($usecoupon)) 
        {
            UseCoupon::where('coupon_id',$request->coupon_id)->delete();
        }
        if (!empty($share)) 
        {
            Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->delete();
        }
        if (!empty($term)) 
        {
            CouponTerm::where('coupon_id',$request->coupon_id)->delete();
        }

        Coupon::where('user_id',$user_id)->where('coupon_id',$request->coupon_id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Coupon Delete Successfully',
            'status' => 200,
        ]);

    }
    
    public function location_list(Request $request)
    {
        $location = Location::all();

        return response()->json([
            'success' => true,
            'data' =>  $location,
            'message' => 'Location List',
            'status' => 200,
        ]);
    }
}
