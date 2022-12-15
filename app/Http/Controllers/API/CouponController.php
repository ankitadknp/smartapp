<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\ClientMyCoupon;
use App\Coupon;
use App\CouponQRcode;
use App\CouponTerm;
use App\Http\Controllers\Controller;
use App\Share;
use App\User;
use App\Location;
use DB,QrCode,URL,Validator,File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'term_condition_ar' => 'required',
            'term_condition_he' => 'required',
            'coupon_title' => 'required|max:50',
            'coupon_title_ar' => 'required|max:50',
            'coupon_title_he' => 'required|max:50',
            'coupon_description' => 'required',
            'category_id' => 'required',
            'qrcode_url' => 'required|url',
            'language_code' => 'required',
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

        $language_code = $request->language_code;

        $couponRes = Coupon::create($input);

        $publicPath = public_path('qrcodes/'.time().'.svg');
        $fileName = basename($publicPath);
        $basePath = URL::to('/public/qrcodes/'.$fileName);

        $user_data = User::where('user_status','=',0)->where('is_verified_mobile_no',1)->where('status',1)->get();

        if ($couponRes->coupon_id) {
            QrCode::generate($request->qrcode_url, $publicPath);
            $QrRes = CouponQRcode::create([
                'coupon_id' => $couponRes->coupon_id,
                'qrcode_url' => $request->qrcode_url,
                'qrcode_file' => $basePath,
            ]);

            if ( !empty ($request->term_condition) ) {
                $term = json_decode($request->term_condition);
                foreach ($term as $val)
                {
                    CouponTerm::create([
                        'coupon_id' => $couponRes->coupon_id,
                        'term_condition' => $val,
                    ]);
                }
            }
            if ( !empty ($request->term_condition_ar) ) {
                $term_ar = json_decode($request->term_condition_ar);
                foreach ($term_ar as $val)
                {
                    CouponTerm::create([
                        'coupon_id' => $couponRes->coupon_id,
                        'term_condition_ar' => $val,
                    ]);
                }
            }
            if ( !empty ($request->term_condition_he) ) {
                $term_he = json_decode($request->term_condition_he);
                foreach ($term_he as $val)
                {
                    CouponTerm::create([
                        'coupon_id' => $couponRes->coupon_id,
                        'term_condition_he' => $val,
                    ]);
                }
            }

            //send notification
            if ( $user_data != '[]') {
                foreach( $user_data as $u_val) {
                    $user_device= DB::table('user_device')->where('user_id',$u_val->id)->first();
                    if ( !empty($user_device) ) {
                        $notification_controller = new NotificationController();
                        $msgVal  = "Coupon '$request->coupon_code' is available";
                        $title = 'Add Coupon';
                        $type = 3;
                        $u_id = $u_val->id;
                        $device_token = $user_device->device_token;
                        $notification_controller->add_notification($msgVal,$title,$u_id,$type);
                        $notification_controller->send_notification($msgVal,$device_token,$title);
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => $couponRes,
            'message' => 'Added Coupon Successfully',
            'status' => 200,
        ]);
    }

    // public   function translateLanguage($coupon_title,$language_code,$remainlanguageRes)
    // {
    //     $curl = curl_init();

    //     $translateRes = array();

    //     foreach ($remainlanguageRes as $key => $val) {
    //         curl_setopt_array($curl, [
    //             CURLOPT_URL => "https://deep-translate1.p.rapidapi.com/language/translate/v2",
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 30,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => "POST",
    //             CURLOPT_POSTFIELDS => "{\r\n    \"q\": \"$coupon_title\",
    //                 \r\n    \"source\": \"en\",
    //                 \r\n    \"target\": \"$val\"\r\n}",
    //             CURLOPT_HTTPHEADER => [
    //                 "X-RapidAPI-Host: deep-translate1.p.rapidapi.com",
    //                 "X-RapidAPI-Key: 73378b18c9mshfce92a38975152dp1c713ajsnda716e5a2204",
    //                 "content-type: application/json"
    //             ],
    //         ]);

    //         $response = curl_exec($curl);
    //         $result = json_decode($response);
    //         $translateRes[$val] = $result->data->translations->translatedText;
    //     }

    //     $err = curl_error($curl);

    //     curl_close($curl);
   
    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         if ( !empty($response) ) {
    //             return $translateRes;
    //         }
    //     }

    // }
   
    public function coupon_list(Request $request)
    {
        $user_id = Auth::user()->id;
        $search = $request->search;
        $locationId = $request->location_id;
        $discount_type = $request->discount_type;
        $category_id = $request->category_id;

        $user = User::find($user_id);

        $coupon = Coupon::select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url','users.website','users.location_url')
                ->leftJoin('users', function ($join) {
                    $join->on('users.id', '=', 'coupon.user_id');
                })
                ->leftJoin('coupon_qrcode', function ($join) {
                    $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                })
                ->where(function ($query) use ($search,$locationId,$discount_type,$category_id) { 
                    if (!empty($search)) {
                        $query->where('coupon.coupon_code', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.coupon_title', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.coupon_title_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.coupon_title_he', 'LIKE', '%'.$search.'%')
                            //->orWhere('coupon.location', 'LIKE', '%'.$search.'%')
                            ->orWhere('coupon.discount_type', 'LIKE', '%'.$search.'%');
                    }
                    if ( !empty($locationId) ) {
                        $query->where('coupon.location_id', $locationId);
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
            $term_ar = [];
            $term_he = [];

            $coupon_id = $val->coupon_id;
            $termcon = CouponTerm::where('coupon_id',$coupon_id)->get();

            foreach ($termcon as $t_val)
            {
                if ( !empty($t_val->term_condition) ) {
                    $value = $t_val->term_condition;
                    array_push($term,$value);
                }
                if ( !empty($t_val->term_condition_ar) ) {
                    $value = $t_val->term_condition_ar;
                    array_push($term_ar,$value);
                }
                if ( !empty($t_val->term_condition_he) ) {
                    $value = $t_val->term_condition_he;
                    array_push($term_he,$value);
                }
            }

            $coupon[$key]['term_condition'] = $term;
            $coupon[$key]['term_condition_ar'] = $term_ar;
            $coupon[$key]['term_condition_he'] = $term_he;
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
            'term_condition_ar' => 'required',
            'term_condition_he' => 'required',
            'coupon_title' => 'required|max:50',
            'coupon_title_ar' => 'required|max:50',
            'coupon_title_he' => 'required|max:50',
            'discount_amount' => 'required',
            'discount_type' => 'required',
            'location_id' => 'required',
            'expiry_date' => 'required',
            'term_condition' => 'required',
            'category_id' => 'required',
            'qrcode_url' => 'required',
            'language_code' => 'required',
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

        $coupon = Coupon::leftJoin('locations', function ($join) {
            $join->on('locations.id', '=', 'coupon.location_id');
        })
        ->select('coupon.*','locations.*')
        ->where('coupon.coupon_id',$request->coupon_id)
        ->first();

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

        if (!empty($request->term_condition_he) || !empty($request->term_condition_ar) || !empty($request->term_condition_he)) 
        {
            CouponTerm::where('coupon_id',$request->coupon_id)->delete();
        }

        if (!empty($request->term_condition)) 
        {
            $term = json_decode($request->term_condition);

            foreach ($term as $val)
            {
                CouponTerm::create([
                    'coupon_id' => $request->coupon_id,
                    'term_condition' => $val,
                ]);
            }
        }

        
        if (!empty($request->term_condition_ar)) 
        {
            $term_ar = json_decode($request->term_condition_ar);

            foreach ($term_ar as $val)
            {
                CouponTerm::create([
                    'coupon_id' => $request->coupon_id,
                    'term_condition_ar' => $val,
                ]);
            }
        }

        
        if (!empty($request->term_condition_he)) 
        {
            $term_he = json_decode($request->term_condition);

            foreach ($term_he as $val)
            {
                CouponTerm::create([
                    'coupon_id' => $request->coupon_id,
                    'term_condition_he' => $val,
                ]);
            }
        }

        $coupon->update($input);

        $success['coupon_id'] = $coupon->coupon_id;
        $success['coupon_code'] = $coupon->coupon_code;
        $success['discount_amount'] = $coupon->discount_amount;
        $success['discount_type'] = $coupon->discount_type;
        $success['location_id'] = $coupon->location_id;
        $success['location'] = $coupon->city_area;
        $success['location_ab'] = $coupon->city_area_ab;
        $success['location_he'] = $coupon->city_area_he;
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
                    ->select('coupon.*', 'users.business_logo','users.website','users.location_url')
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
                    ->select('coupon.*', 'users.business_logo','users.website','users.location_url')
                    ->where('client_my_coupon.user_id', $user_id)
                    ->whereDate('coupon.expiry_date', '<', $currentDate)
                    ->orderby('client_my_coupon.client_my_coupon_id','DESC')
                    ->get();

        foreach ($active_coupon_list as $key=>$val)
        {
            $term = [];
            $term_ar = [];
            $term_he = [];

            $coupon_id = $val->coupon_id;
            $termcon = CouponTerm::where('coupon_id',$coupon_id)->get();

            foreach ($termcon as $t_val)
            {
                if ( !empty($t_val->term_condition) ) {
                    $value = $t_val->term_condition;
                    array_push($term,$value);
                }
                if ( !empty($t_val->term_condition_ar) ) {
                    $value = $t_val->term_condition_ar;
                    array_push($term_ar,$value);
                }
                if ( !empty($t_val->term_condition_he) ) {
                    $value = $t_val->term_condition_he;
                    array_push($term_he,$value);
                }
            }
  
            $active_coupon_list[$key]['term_condition'] = $term;
            $active_coupon_list[$key]['term_condition_ar'] = $term_ar;
            $active_coupon_list[$key]['term_condition_he'] = $term_he;
        }

        foreach ($inactive_coupon_list as $key=>$val)
        {
            $term = [];
            $term_ar = [];
            $term_he = [];

            $coupon_id = $val->coupon_id;
            $termcon = CouponTerm::where('coupon_id',$coupon_id)->get();
            $term_count = CouponTerm::where('coupon_id',$coupon_id)->count();

            for ($i=0; $i<count($termcon); $i++) 
            {
            
                if ( !empty($termcon[$i]->term_condition) ) {
                    $value = $termcon[$i]->term_condition;
                    array_push($term,$value);
                }
                if ( !empty($termcon[$i]->term_condition_ar) ) {
                    $value = $termcon[$i]->term_condition_ar;
                    array_push($term_ar,$value);
                }
                if ( !empty($termcon[$i]->term_condition_he) ) {
                    $value = $termcon[$i]->term_condition_he;
                    array_push($term_he,$value);
                }
            }
            $inactive_coupon_list[$key]['term_condition'] = $term;
            $inactive_coupon_list[$key]['term_condition_ar'] = $term_ar;
            $inactive_coupon_list[$key]['term_condition_he'] = $term_he;
        }

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

        $coupon = Coupon::leftJoin('locations', function ($join) {
            $join->on('locations.id', '=', 'coupon.location_id');
        })
        ->select('coupon.*','locations.*')
        ->where('coupon.coupon_id',$request->coupon_id)
        ->first();

        if ( !empty($coupon) ) {
            $total_coupon = Coupon::where('user_id',$user_id)->count();
            $total_add = ClientMyCoupon::where('coupon_id', $request->coupon_id)->count();
            $total_use = DB::table('apply_coupon_by_merchant')->where('coupon_id', $request->coupon_id)->count();
            $total_share = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->count();
            $total_email = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->where('share_by', 1)->count();
            $total_whatsapp = Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->where('share_by', 0)->count();

            $success['coupon_id'] = $coupon->coupon_id;
            $success['coupon_code'] = $coupon->coupon_code;
            $success['discount_amount'] = $coupon->discount_amount;
            $success['discount_type'] = $coupon->discount_type;
            $success['location_id'] = $coupon->location_id;
            $success['location'] = $coupon->city_area;
            $success['location_ab'] = $coupon->city_area_ab;
            $success['location_he'] = $coupon->city_area_he;
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
