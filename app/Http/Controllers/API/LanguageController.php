<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Language;
use App\LanguageSetting;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use Illuminate\Validation\Rule;

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
                'message' => "Language List",
                'status' => 200
            ];

            return response()->json($response, 200); 
        } 
    }

    public function language_setting(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'language_id' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $lan_set_data = LanguageSetting::where('user_id',$user_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ( empty($lan_set_data) || !isset($lan_set_data)) {

            $success = LanguageSetting::create($input);

        } else {

            $language = LanguageSetting::where('user_id',$user_id)->update(['language_id'=>$request->language_id]);

            $success['language_id'] =  $lan_set_data->language_id ;
            $success['user_id'] =  $lan_set_data->user_id;

        }

        $lan_data = Language::where('language_id',$request->language_id)->first();

        $success['language_name'] =  $lan_data->language_name;
        $success['language_code'] =  $lan_data->language_code;

        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => 'Language Setting',
            'status' => 200
        ]);

    }
}