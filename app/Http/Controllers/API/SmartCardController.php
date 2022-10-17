<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmartCardController extends Controller
{
    public function getQrCode(Request $request)
    {
        $user_id = Auth::user()->id;
        if (isset($user_id) && !empty($user_id)) {
        }

        return response()->json([
            'success' => true,
            'data' => '',
            'message' => 'Coupon QR Code',
            'status' => 200,
        ]);
    }
}
