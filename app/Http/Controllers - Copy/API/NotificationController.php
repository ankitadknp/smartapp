<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function add_notification(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'title' => 'required', 
            'description' => 'required', 
            'type' => 'required',    
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
        
        $input = $request->all();
        $input['user_id'] = $user_id;
        $input['status'] = 1;

        
        $notification = Notification::create($input);

        return response()->json([
            'success' => true,
            'data'=>$notification,
            'message' => 'Add Notification Successfully',
            'status' => 200
        ]);
    }

    public function notification_list(Request $request)
    {
        $user_id = Auth::user()->id;

        $notification = Notification::where('user_id',$user_id)->orderby('notification_id','DESC')->get();

        return response()->json([
            'success' => true,
            'data'=>$notification,
            'message' => 'Notification List Successfully',
            'status' => 200
        ]);
    }
}