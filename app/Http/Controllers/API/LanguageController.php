<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Language;
use App\User;
use App\LanguageSetting;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function language_list(Request $request)
    {
        $user = auth()->user();

        if ( !empty($user)) 
        {
           $data = Language::get();

           $response = [
                'success' => true,
                'data'    => $data,
                'message' => trans('message.language'),
                'status' => 200
            ];

            return response()->json($response, 200); 
        } 
    }

    public function language_setting(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'language_code' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $lan_set_data = User::where('id',$user_id)->first();

        $language = User::where('id',$user_id)->update(['language_code'=>$request->language_code]);

        $success['language_code'] =  $request->language_code ;

        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' =>  trans('message.language_setting'),
            'status' => 200
        ]);

    }
}