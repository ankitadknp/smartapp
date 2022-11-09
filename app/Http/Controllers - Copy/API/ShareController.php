<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Share;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    public function share(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'value' => 'required', 
            'type' => 'required', 
            'share_by' => 'required',    
        ]);

        if($validator->fails())
        {

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        if ($request->type == 0) 
        {
            $key = 'blog_id';
        } else if ($request->type == 1) 
        {
            $key = 'public_feed_id';
        } else if ($request->type == 2) 
        {
            $key = 'coupon_id';
        }

        $share = Share::where('value', $request->value)->where('key', $key)
                 ->where('share_by',$request->share_by)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;
        $input['key'] = $key;

        if ( empty($share) || !isset($share)) {

            $feed_comment = Share::create($input);

            return response()->json([
                'success' => true,
                'message' => 'Shared Successfully',
                'status' => 200
            ]);

        } else {

            $response = [
                'success' => false,
                'message' => 'Already shared',
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }
    }

}