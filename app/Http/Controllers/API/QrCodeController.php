<?php

namespace App\Http\Controllers\API;

use App\CouponQRcode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class QrCodeController extends Controller
{
    public function getQrCode(Request $request)
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

        if (isset($request->coupon_id) && !empty($request->coupon_id)) {
            $QrRes = CouponQRcode::where('coupon_id', $request->coupon_id)->first();
        }

        return response()->json([
            'success' => true,
            'data' => $QrRes,
            'message' =>  trans('message.qr_code'),
            'status' => 200,
        ]);
    }
}
