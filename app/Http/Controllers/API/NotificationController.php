<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function add_notification($msgVal,$title,$user_id,$type)
    {
        
       $add = array(
        'user_id' =>$user_id,
        'title'=>$title,
        'description'=>$msgVal,
        'status'=>1,
        'type'=>$type
       );
        
        $notification = Notification::create($add);

        return true;
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

    public function send_notification($msgVal,$device_token,$title) {
        $server_key = 'AAAAnqpM3rU:APA91bEgxavRy82K9zuZoxjGzwpdtwDXfIhXj_MCWj9_irDPm7sU2Sg4AGg_VSPIMkBD3uOsDIhSe2LXP3psn71M5QDlKPgrNwfC7wXtGz0y-3NIra-5RtPtP1QVpLAE1QN8zfA3kU3f';

        $headers = array(
            'Authorization:key='.$server_key,
            'Content-Type: application/json'
        );

        $payload=[
            'to'=>$device_token,
            'notification'=>[
                'title' => $title,
                'body' => $msgVal,
            ],
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $result = curl_exec($ch);
        // print_r($result);exit;

        if ( $result === FALSE) {
            die('FCM Send Error:'.curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
}