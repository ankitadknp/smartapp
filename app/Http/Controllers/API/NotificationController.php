<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function add_notification($msgVal,$title,$user_id,$type,$coupon_id,$feed_id,$blog_id)
    {
        
       $add = array(
        'user_id' => $user_id,
        'title' => $title,
        'description' => $msgVal,
        'status' =>1,
        'type' => $type,
        'coupon_id' => $coupon_id,
        'feed_id' => $feed_id,
        'blog_id' => $blog_id,
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

    public function send_notification($msgVal,$device_token,$title,$id,$type) {
        // $server_key = 'AAAAnqpM3rU:APA91bEgxavRy82K9zuZoxjGzwpdtwDXfIhXj_MCWj9_irDPm7sU2Sg4AGg_VSPIMkBD3uOsDIhSe2LXP3psn71M5QDlKPgrNwfC7wXtGz0y-3NIra-5RtPtP1QVpLAE1QN8zfA3kU3f';

        $server_key = 'AAAAy6Q_iZI:APA91bFDxpaLVOuVukK8dfiFzFkDhfH67REqZfafSc-RAG2qbPHc63I4V2iXUIeCocEHyD0GyrlgsFZ_L7N4em3P9brwPk3sf9-EvEDunzJ29pV8clVDHLHguRdts4scZJ4-AolBz0yS';

        if ($type == 1) {
            $type_name = 'blog';
        } else if ($type == 2) {
            $type_name = 'public_feed';
        }else if ($type == 3) {
            $type_name = 'coupon';
        }else if ($type == 4) {
            $type_name = 'smart_citizen_card';
        }

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
            'data' =>[
                'id' =>$id,
                'type' => $type_name,
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $result = curl_exec($ch);

        if ( $result === FALSE) {
            die('FCM Send Error:'.curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public function clear_notification(Request $request)
    {
        $user_id = Auth::user()->id;

        Notification::where('user_id',$user_id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notification Clear Successfully',
            'status' => 200
        ]);
    }
}