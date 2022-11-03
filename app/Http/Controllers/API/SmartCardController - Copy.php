<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\SmartCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SmartCardController extends Controller
{
    public function varifyCard(Request $request)
    {
        $user_id = Auth::user()->id;
        if (isset($user_id) && !empty($user_id)) {
            $checkCardRes = SmartCards::where('user_id', $user_id)->first();
            if (isset($checkCardRes) && !empty($checkCardRes)) {
                $checkCardRes->status = 'Cancelled';
                $checkCardRes->save();
            }
            $cardRes = SmartCards::create([
                'user_id' => $user_id,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $cardRes,
            'message' => 'Card has been varified',
            'status' => 200,
        ]);
    }

    public function cancelledCard(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'card_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $checkCardRes = SmartCards::where('id', $request->card_id)->first();

        if (isset($checkCardRes) && !empty($checkCardRes)) {
            $checkCardRes->status = 'Cancelled';
            $checkCardRes->save();

            return response()->json([
            'success' => true,
            'data' => $checkCardRes,
            'message' => 'Card has been Cancelled!',
            'status' => 200,
        ]);
        } else {
            return response()->json([
            'success' => true,
            'message' => 'Card not found!',
            'status' => 201,
        ]);
        }
    }
}
