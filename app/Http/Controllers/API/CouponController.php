<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\ClientMyCoupon;
use App\Coupon;
use App\CouponQRcode;
use App\Http\Controllers\Controller;
use App\Share;
use App\UseCoupon;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use QrCode;
use URL;
use Validator;

class CouponController extends Controller
{
    public function add_coupon(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required|max:20',
            'discount_amount' => 'required',
            'discount_type' => 'required',
            'location' => 'required',
            'expiry_date' => 'required',
            // 'term_condition' => 'required',
            'coupon_title' => 'required|max:50',
            'coupon_description' => 'required',
            'category_id' => 'required',
            'qrcode_url' => 'required',
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
        }

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

        $BUSINESS_LOGO_URL = Config::get('constants.BUSINESS_LOGO_URL');

        if ($user->user_status == 1) {
            if ($search != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                        $join->on('users.id', '=', 'coupon.user_id');
                    })
                    ->leftJoin('coupon_qrcode', function ($join) {
                        $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                    })
                    ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                    ->where('coupon.coupon_code', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.coupon_title', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.coupon_title_ab', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.coupon_title_he', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.location', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.discount_type', 'LIKE', '%'.$search.'%')
                    ->where('coupon.user_id', '=', $user_id)
                    ->orderby('coupon.coupon_id', 'DESC')
                    ->get();
            } elseif ($location != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.location', 'LIKE', '%'.$location.'%')
                        ->where('coupon.user_id', '=', $user_id)
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            } elseif ($discount_type != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.discount_type', 'LIKE', '%'.$discount_type.'%')
                        ->where('coupon.user_id', '=', $user_id)
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            } elseif ($category_id != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->select('coupon.*','users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.category_id', $category_id)
                        ->where('coupon.user_id', '=', $user_id)
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            } else {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.user_id', '=', $user_id)
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            }
        } elseif ($user->user_status == 0) {
            if ($search != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                        $join->on('users.id', '=', 'coupon.user_id');
                    })
                    ->leftJoin('coupon_qrcode', function ($join) {
                        $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                    })
                    ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                    ->where('coupon.coupon_code', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.coupon_title', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.coupon_title_ab', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.coupon_title_he', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.location', 'LIKE', '%'.$search.'%')
                    ->orWhere('coupon.discount_type', 'LIKE', '%'.$search.'%')
                    ->orderby('coupon.coupon_id', 'DESC')
                    ->get();
            } elseif ($location != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.location', 'LIKE', '%'.$location.'%')
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            } elseif ($discount_type != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.discount_type', 'LIKE', '%'.$discount_type.'%')
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            } elseif ($category_id != '') {
                $coupon = Coupon::leftJoin('users', function ($join) {
                            $join->on('users.id', '=', 'coupon.user_id');
                        })
                        ->leftJoin('coupon_qrcode', function ($join) {
                            $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                        })
                        ->leftJoin('category', function($join) {
                            $join->on('coupon.category_id', '=', 'category.category_id')
                            ->where('category.type','=','Coupon');
                        })
                        ->select('coupon.*','users.business_logo','coupon_qrcode.qrcode_url')
                        ->where('coupon.category_id', $category_id)
                        ->orderby('coupon.coupon_id', 'DESC')
                        ->get();
            } else {
                $coupon = Coupon::leftJoin('users', function ($join) {
                        $join->on('users.id', '=', 'coupon.user_id');
                    })
                    ->leftJoin('coupon_qrcode', function ($join) {
                        $join->on('coupon_qrcode.coupon_id', '=', 'coupon.coupon_id');
                    })
                    ->select('coupon.*', 'users.business_logo','coupon_qrcode.qrcode_url')
                    ->orderby('coupon.coupon_id', 'DESC')
                    ->get();
            }
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
            'location' => 'required',
            'expiry_date' => 'required',
            // 'term_condition' => 'required',
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

        if ($request->qrcode_url != '') {

            $publicPath = public_path('qrcodes/'.time().'.svg');
            $fileName = basename($publicPath);
            $basePath = URL::to('/public/qrcodes/'.$fileName);

            QrCode::generate($request->qrcode_url, $publicPath);
            $QrRes = CouponQRcode::where('coupon_id',$request->coupon_id)->update([
                'qrcode_url' => $request->qrcode_url,
                'qrcode_file' => $basePath,
            ]);
        } 

        $coupon->update($input);

        $success['coupon_id'] = $coupon->coupon_id;
        $success['coupon_code'] = $coupon->coupon_code;
        $success['discount_amount'] = $coupon->discount_amount;
        $success['discount_type'] = $coupon->discount_type;
        $success['location'] = $coupon->location;
        $success['expiry_date'] = $coupon->expiry_date;
        $success['term_condition'] = $coupon->term_condition;
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

        if ($added_coupon == '' || !isset($added_coupon)) {
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

        $BUSINESS_LOGO_URL = Config::get('constants.BUSINESS_LOGO_URL');

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

        $blog_comment_like_data = UseCoupon::where('user_id', $user_id)->where('coupon_id', $request->coupon_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($blog_comment_like_data == '' || !isset($blog_comment_like_data)) {
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

        Coupon::where('user_id',$user_id)->where('coupon_id',$request->coupon_id)->delete();

        if ($mycoupon != '[]') 
        {
            ClientMyCoupon::where('coupon_id',$request->coupon_id)->delete();
        }
        if ($qrcode != '[]') 
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
        if ($usecoupon != '[]') 
        {
            UseCoupon::where('coupon_id',$request->coupon_id)->delete();
        }
        if ($share != '[]') 
        {
            Share::where('key', 'coupon_id')->where('value', $request->coupon_id)->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Coupon Delete Successfully',
            'status' => 200,
        ]);

    }
}
