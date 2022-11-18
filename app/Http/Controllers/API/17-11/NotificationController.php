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

    public function send_notification($device_token,$msgVal) {
        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: key=AAAA6zB6G50:APA91bFXYT3W5YnaNhUvJCAGAKBzWsyIEY-CpH5EGQen-Y0QQIjQwfdrYxkTi3w5Fe9aeZEuwotACprIfrQtO3py1eFj7prbWb3HjAthEGEPya3-t008AWABiI5a5liwH6vHqTJfseuz';
        $payload=[
            'to'=>$device_token,
            // 'data' =>$body,
            'notification'=>[
                'title' =>$msgVal,
                'body' => $msgVal,
            ],
        ];
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($crl, CURLOPT_POST,true);
        curl_setopt($crl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode( $payload ));
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($crl);
        curl_close($crl);
        $resultArr = json_decode($result, true);
        if (isset($resultArr['success']) && $resultArr['success'] == 1) {
            return true;
        }
        return false;
    }
}