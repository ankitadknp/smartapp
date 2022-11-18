<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash,File,DB,Validator,Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $request , User $user)
    {
        if ($request->user_status == 1) {

            $validator = Validator::make($request->all(), [
                'business_name' => 'required|max:50',
                'registration_number' => 'required|max:30',
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')
                        ->where('user_status', $request->user_status)
                ],
                'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'website' => 'required|max:50',
                'business_activity' => 'required',
                'business_sector' => 'required',
                'establishment_year' => 'required',
                'business_logo' => 'required',
                'business_hours' => 'required',
                'street_address_name' => 'required|max:50',
                'street_number' => 'required',
                'district' => 'required|max:50',
                // 'device_token' => 'required',
           
            ]);

            if($validator->fails()){

                $response = [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'status' => 400
                ];
        
                return response()->json($response, 400);
            }

            $input['user_status'] = $request->user_status;
            $verify_otp = '111111';
            $verify_otp_time = Carbon::now()->addMinutes(5);
            $user_status = 1;

        } else {
            
            $user_validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')
                        ->where('user_status', $request->user_status)
                ],
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'id_number' => 'required|max:20',
                'marital_status' => 'required',
                'no_of_child' => 'required',
                'occupation' => 'required|max:50',
                'education_level' => 'required',
                'street_address_name' => 'required|max:50',
                'street_number' => 'required',
                'house_number' => 'required',
                'city' => 'required|max:50',
                'district' => 'required|max:50',
                // 'device_token' => 'required',
            ]);

            if($user_validator->fails()){

                $response = [
                    'success' => false,
                    'message' => $user_validator->errors()->first(),
                    'status' => 400
                ];
        
                return response()->json($response, 400);
            }

            $input['user_status'] = $request->user_status;

            $verify_otp = '111111';
            $verify_otp_time = Carbon::now()->addMinutes(5);
            $user_status = 0;

        }
       
        $input = $request->all();

        $input['verify_otp'] = $verify_otp;
        $input['verify_otp_time'] = $verify_otp_time;
        $input['is_verified_mobile_no'] = 0;
        $input['status'] = 1;

        $STORE_IMGAE_URL =  Config::get('constants.BUSINESS_LOGO_URL');

        if ($request->hasFile('business_logo')) {
            
            $image = $request->file('business_logo');
            $cover_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/business_logo';

            

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
           
            $image->move($destinationPath, $cover_image_name);
            $pic = $STORE_IMGAE_URL.$cover_image_name;
            $input['business_logo'] = $pic;
        }
   
       
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        // if ( !empty($user) ) {
        //     DB::table('user_device')->insert([
        //         'user_id' =>$user->id,
        //         'device_token'=>$request->device_token
        //     ]);
        // }

        $success['token'] =  $user->createToken('SmartApp')->accessToken;
        $success['user_id'] =  $user->id;
        $success['email'] =  $user->email;
        $success['first_name'] =  ($user->first_name != null)?$user->first_name:'';
        $success['last_name'] =  ($user->last_name != null)?$user->last_name:'';
        $success['phone_number'] = ($user->phone_number != null)?$user->phone_number:'';
        $success['id_number'] =($user->id_number != null)?$user->id_number:'';
        $success['marital_status'] =  ($user->marital_status != null)?$user->marital_status:'';
        $success['no_of_child'] =  $user->no_of_child;
        $success['occupation'] =  ($user->occupation != null)?$user->occupation:'';
        $success['education_level'] =  ($user->education_level != null)?$user->education_level:'';
        $success['business_name'] =  ($user->business_name != null)?$user->business_name:'';
        $success['registration_number'] =  ($user->registration_number != null)?$user->registration_number:'';
        $success['website'] =  ($user->website != null)?$user->website:'';
        $success['business_activity'] =  ($user->business_activity != null)?$user->business_activity:'';
        $success['business_sector'] =  ($user->business_sector != null)?$user->business_sector:'';
        $success['establishment_year'] =  ($user->establishment_year != null)?$user->establishment_year:'';
        $success['business_logo'] =  ($user->user_status == 1)?$user->business_logo:'';
        $success['business_hours'] =  ($user->business_hours != null)?$user->business_hours:'';
        $success['is_verified_mobile_no'] = $user->is_verified_mobile_no;
        $success['street_address_name'] =  ($user->street_address_name != null)?$user->street_address_name:'';
        $success['street_number'] =  ($user->street_number != null)?$user->street_number:'';
        $success['house_number'] =  ($user->house_number != null)?$user->house_number:'';
        $success['city'] =  ($user->city != null)?$user->city:'';
        $success['district'] =  ($user->district != null)?$user->district:'';
        $success['user_status'] =  $user_status;
   

        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => 'User Register Successfully',
            'status' => 200
        ]);
    }

    public function login(Request $request)
    {

        $BUSINESS_LOGO_URL =  Config::get('constants.BUSINESS_LOGO_URL');

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'user_status' => 'required',
        ]);
    
        if ($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => ($request->password),'user_status' => ($request->user_status)])){ 

            $user = Auth::user(); 
            if ( $user->status == 1) 
            {
                    
                $success['token'] =  $user->createToken('SmartApp')->accessToken;
                $success['user_id'] =  $user->id;
                $success['email'] =  $user->email;
                $success['first_name'] =  ($user->first_name != null)?$user->first_name:'';
                $success['last_name'] =  ($user->last_name != null)?$user->last_name:'';
                $success['phone_number'] = ($user->phone_number != null)?$user->phone_number:'';
                $success['id_number'] =($user->id_number != null)?$user->id_number:'';
                $success['marital_status'] =  ($user->marital_status != null)?$user->marital_status:'';
                $success['no_of_child'] =  $user->no_of_child;
                $success['occupation'] =  ($user->occupation != null || $user->occupation == 0)?$user->occupation:'';
                $success['education_level'] =  ($user->education_level != null)?$user->education_level:'';
                $success['business_name'] =  ($user->business_name != null)?$user->business_name:'';
                $success['registration_number'] =  ($user->registration_number != null)?$user->registration_number:'';
                $success['website'] =  ($user->website != null)?$user->website:'';
                $success['business_activity'] =  ($user->business_activity != null)?$user->business_activity:'';
                $success['business_sector'] =  ($user->business_sector != null)?$user->business_sector:'';
                $success['establishment_year'] =  ($user->establishment_year != null)?$user->establishment_year:'';
                $success['business_logo'] =  ($user->user_status == 1)?$user->business_logo:'';
                $success['business_hours'] =  ($user->business_hours != null)?$user->business_hours:'';
                $success['is_verified_mobile_no'] = $user->is_verified_mobile_no;
                $success['street_address_name'] =  ($user->street_address_name != null)?$user->street_address_name:'';
                $success['street_number'] =  ($user->street_number != null)?$user->street_number:'';
                $success['house_number'] =  ($user->house_number != null)?$user->house_number:'';
                $success['city'] =  ($user->city != null)?$user->city:'';
                $success['district'] =  ($user->district != null)?$user->district:'';
                $success['user_status'] =  $user->user_status;
                
                return response()->json([
                    'success' => true,
                    'data'    => $success,
                    'message' => 'Login Successfuly',
                    'status' => 200
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'message' =>'User is blocked',
                    'status' => 401
                ]);
            }

        } else { 
            return response()->json([
                'success' => false,
                // 'message' =>'Your login credentials could not be verified, please try again.',
                'message' =>'Invalid email or password,please try again.',
                'status' => 401
            ]);
        } 
    }

    public function verify_phone_number(Request $request) 
    {
        $user_id = Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required',
            'otp' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 200
            ];
    
            return response()->json($response, 400);
        }

        $user = User::select('*')->where('phone_number',$request->phone_number)->where('id',$user_id)->first();

        if ( empty($user) ) {

            $response = [
                'success' => false,
                'message' => 'Please Enter Valid Phone Number',
                'status' => 400
            ];
    
            return response()->json($response, 400);

        } else {

            // if ( strtotime($user->verify_otp_time) > strtotime(now()) ) 
            // {
                if ($user->verify_otp == $request->otp) {

                    User::where('id',$user->id)->update(['is_verified_mobile_no'=>1]);

                    $STORE_IMGAE_URL =  Config::get('constants.BUSINESS_LOGO_URL');

                    $pic = $STORE_IMGAE_URL.$user->business_logo;

                    $success['user_id'] =  $user->id;
                    $success['email'] =  $user->email;
                    $success['first_name'] =  ($user->first_name != null)?$user->first_name:'';
                    $success['last_name'] =  ($user->last_name != null)?$user->last_name:'';
                    $success['phone_number'] = ($user->phone_number != null)?$user->phone_number:'';
                    $success['id_number'] =($user->id_number != null)?$user->id_number:'';
                    $success['marital_status'] =  ($user->marital_status != null)?$user->marital_status:'';
                    $success['no_of_child'] =  $user->no_of_child;
                    $success['occupation'] =  ($user->occupation != null)?$user->occupation:'';
                    $success['education_level'] =  ($user->education_level != null)?$user->education_level:'';
                    $success['business_name'] =  ($user->business_name != null)?$user->business_name:'';
                    $success['registration_number'] =  ($user->registration_number != null)?$user->registration_number:'';
                    $success['website'] =  ($user->website != null)?$user->website:'';
                    $success['business_activity'] =  ($user->business_activity != null)?$user->business_activity:'';
                    $success['business_sector'] =  ($user->business_sector != null)?$user->business_sector:'';
                    $success['establishment_year'] =  ($user->establishment_year != null)?$user->establishment_year:'';
                    $success['business_logo'] =  ($user->business_logo != null)?$pic:'';
                    $success['business_hours'] =  ($user->business_hours != null)?$user->business_hours:'';
                    $success['is_verified_mobile_no'] = 1;
                    $success['street_address_name'] =  ($user->street_address_name != null)?$user->street_address_name:'';
                    $success['street_number'] =  ($user->street_number != null)?$user->street_number:'';
                    $success['house_number'] =  ($user->house_number != null)?$user->house_number:'';
                    $success['city'] =  ($user->city != null)?$user->city:'';
                    $success['district'] =  ($user->district != null)?$user->district:'';
                    $success['user_status'] =  $user->user_status;
                  
        
                    $response = [
                        'success' => true,
                        'data'=>$success,
                        'message' => 'Phone number verified successfully.',
                        'status' => 200
                    ];
            
                    return response()->json($response, 200);
        
                } else {

                    $response = [
                        'success' => false,
                        'message' => 'Otp Is Incorrect.',
                        'status' => 400
                    ];
            
                    return response()->json($response, 400);
                }

            // } else {
            //     $response = [
            //         'success' => false,
            //         'message' => 'Otp Is Expired.',
            //         'status' => 400
            //     ];
        
            //     return response()->json($response, 400);
            // }
        }
    }

    public function change_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|min:6',
            'new_password' => 'min:6|required_with:new_password_confirmation|same:new_password_confirmation',
            'new_password_confirmation' => 'min:6'
        ]);

        if($validator->fails()) {

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);

        }

        $id = Auth::user()->id;

        $password  = auth()->user()->password;

        if (Hash::check($request->get('current_password'), $password) ) {

            $New_Password = $request->new_password;

            $newPassWord = Hash::make($New_Password);

            User::where('id', $id)->update(['password' => $newPassWord]);

            return response()->json([
                'success' => true,
                'message' => "Password Change Successfully",
                'status' => 200
            ]);

        } else {

            return response()->json([
                'success' => false,
                'message' => "Old Password Doesn't Match",
                'status' => 400
            ]);

        }
    }

    public function get_profile(Request $request)
    {
        
        $user = auth()->user();
   
        if ( !empty($user) ) 
        {
            $success['user_id'] =  $user->id;
            $success['email'] =  $user->email;
            $success['first_name'] =  ($user->first_name != null)?$user->first_name:'';
            $success['last_name'] =  ($user->last_name != null)?$user->last_name:'';
            $success['phone_number'] = ($user->phone_number != null)?$user->phone_number:'';
            $success['id_number'] =($user->id_number != null)?$user->id_number:'';
            $success['marital_status'] =  ($user->marital_status != null)?$user->marital_status:'';
            $success['no_of_child'] =  $user->no_of_child;
            $success['occupation'] =  ($user->occupation != null)?$user->occupation:'';
            $success['education_level'] =  ($user->education_level != null)?$user->education_level:'';
            $success['business_name'] =  ($user->business_name != null)?$user->business_name:'';
            $success['registration_number'] =  ($user->registration_number != null)?$user->registration_number:'';
            $success['website'] =  ($user->website != null)?$user->website:'';
            $success['business_activity'] =  ($user->business_activity != null)?$user->business_activity:'';
            $success['business_sector'] =  ($user->business_sector != null)?$user->business_sector:'';
            $success['establishment_year'] =  ($user->establishment_year != null)?$user->establishment_year:'';
            $success['business_logo'] =  ($user->user_status == 1)?$user->business_logo:'';
            $success['business_hours'] =  ($user->business_hours != null)?$user->business_hours:'';
            $success['is_verified_mobile_no'] = $user->is_verified_mobile_no;
            $success['street_address_name'] =  ($user->street_address_name != null)?$user->street_address_name:'';
            $success['street_number'] =  ($user->street_number != null)?$user->street_number:'';
            $success['house_number'] =  ($user->house_number != null)?$user->house_number:'';
            $success['city'] =  ($user->city != null)?$user->city:'';
            $success['district'] =  ($user->district != null)?$user->district:'';

            $response = [
                'success' => true,
                'data'    => $success,
                'message' => "User Profile",
                'status' => 200
            ];
    
            return response()->json($response, 200); 
    
        }
    }

    public function update_profile(Request $request,User $user)
    {
        $id = Auth::user()->id;

        if ($request->user_status == 1) {

            $validator = Validator::make($request->all(), [
                'business_name' => 'required|max:50',
                'registration_number' => 'required|max:30',
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')->ignore($id)
                        ->where('user_status', $request->user_status)
                ],
                'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'website' => 'required|max:50',
                'business_activity' => 'required',
                'business_sector' => 'required',
                'establishment_year' => 'required',
                'business_logo' => 'required',
                'business_hours' => 'required',
                'street_address_name' => 'required|max:50',
                'street_number' => 'required',
                'district' => 'required|max:50',
            ]);

            if ($validator->fails() ) {

                $response = [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'status' => 400
                ];
        
                return response()->json($response, 400);
            }

        } else {
            
            $user_validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')->ignore($id)
                        ->where('user_status', $request->user_status)
                ],
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'phone_number' =>'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'id_number' => 'required|max:20',
                'marital_status' => 'required',
                'no_of_child' => 'required',
                'occupation' => 'required|max:50',
                'education_level' => 'required',
                'street_address_name' => 'required|max:50',
                'street_number' => 'required',
                'house_number' => 'required',
                'city' => 'required|max:50',
                'district' => 'required|max:50',
            ]);

            if ($user_validator->fails() ) {

                $response = [
                    'success' => false,
                    'message' => $user_validator->errors()->first(),
                    'status' => 400
                ];
        
                return response()->json($response, 400);
            }
        }

		$STORE_IMGAE_URL = Config::get('constants.BUSINESS_LOGO_URL');

        $input = $request->all();

        if ($request->user_status == 1) 
        {

            if ($request->hasFile('business_logo')) {
                $image = $request->file('business_logo');
                $cover_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/business_logo';
                $image->move($destinationPath, $cover_image_name);
                $pic = $STORE_IMGAE_URL.$cover_image_name;
                $input['business_logo']  = $pic;
            }
        }
    
        $user = User::find($id);
        $user->update($input);

        $success['user_id'] =  $user->id;
        $success['email'] =  $user->email;
        $success['first_name'] =  ($user->first_name != null)?$user->first_name:'';
        $success['last_name'] =  ($user->last_name != null)?$user->last_name:'';
        $success['phone_number'] = ($user->phone_number != null)?$user->phone_number:'';
        $success['id_number'] =($user->id_number != null)?$user->id_number:'';
        $success['marital_status'] =  ($user->marital_status != null)?$user->marital_status:'';
        $success['no_of_child'] =  $user->no_of_child;
        $success['occupation'] =  ($user->occupation != null)?$user->occupation:'';
        $success['education_level'] =  ($user->education_level != null)?$user->education_level:'';
        $success['business_name'] =  ($user->business_name != null)?$user->business_name:'';
        $success['registration_number'] =  ($user->registration_number != null)?$user->registration_number:'';
        $success['website'] =  ($user->website != null)?$user->website:'';
        $success['business_activity'] =  ($user->business_activity != null)?$user->business_activity:'';
        $success['business_sector'] =  ($user->business_sector != null)?$user->business_sector:'';
        $success['establishment_year'] =  ($user->establishment_year != null)?$user->establishment_year:'';
        $success['business_logo'] =  ($user->user_status == 1)?$user->business_logo:'';
        $success['business_hours'] =  ($user->business_hours != null)?$user->business_hours:'';
        $success['street_address_name'] =  ($user->street_address_name != null)?$user->street_address_name:'';
        $success['street_number'] =  ($user->street_number != null)?$user->street_number:'';
        $success['house_number'] =  ($user->house_number != null)?$user->house_number:'';
        $success['city'] =  ($user->city != null)?$user->city:'';
        $success['district'] =  ($user->district != null)?$user->district:'';
        $success['is_verified_mobile_no'] = $user->is_verified_mobile_no;

   
        $response = [
            'success' => true,
            'data'    => $success,
            'message' => "Update Profile Successfully",
            'status' => 200
        ];

        return response()->json($response, 200); 
		
    }

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'user_status' =>'required',
        ]);

        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $check_email = User::where('email',$request->email)->first();

        if ( empty($check_email) ) {
			
            return response()->json([
                'success' => false,
                'message' => "User isn't found",
                'status' => 400
                ]);
        } else {
			
            $check_email_deleted = User::where('email',$request->email)->where('status','=',1)
            ->where('user_status',$request->user_status)->first();

            if ( empty($check_email_deleted) ) {
				
                return response()->json([
                    'success' => false,
                    'message' => 'User Account is blocked',
                    'status' => 400
                    ]);
					
            } else {
				
                $token = Str::random(6);

                $data=[	'email' =>$request->email,
						'token' =>$token,
						'created_at' =>date('Y-m-d H:i:s') ];
        
                DB::table('password_resets')->insert($data);

                $newdata = array('token' => $token, 'name'=>$check_email_deleted->name);
            
                Mail::send('emails.forgotpassword', $newdata, function($message) use ($request) {
                    $message->to($request->email)
                        ->from('test.knptech@gmail.com')
                        ->subject("Password Reset");
                });

                return response()->json([
                    'success' => true,
                    'message' =>'We have e-mailed your password reset link!',
                    'status'=>200
                ]);
            }
        }
       
    }
}