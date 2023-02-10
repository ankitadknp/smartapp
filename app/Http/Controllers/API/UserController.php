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
                        ->where('is_account_delete','=',0)
                ],
                // 'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                // 'website' => 'required|max:50',
                //'business_activity' => 'required',
                //'business_sector' => 'required',
                //'establishment_year' => 'required',
                //'business_logo' => 'required',
                //'business_hours' => 'required',
                //'street_address_name' => 'required|max:50',
                //'street_number' => 'required',
                //'district' => 'required|max:50',
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
            $user_status = 1;
            $name = $request->business_name;

        } else {
            
            $user_validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')
                        ->where('user_status', $request->user_status)
                        ->where('is_account_delete','=',0)
                ],
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                // 'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                // 'id_number' => 'required|max:20',
                //'marital_status' => 'required',
                //'no_of_child' => 'required',
                //'occupation' => 'required|max:50',
                //'education_level' => 'required',
                //'street_address_name' => 'required|max:50',
                //'street_number' => 'required',
                //'house_number' => 'required',
                //'city' => 'required|max:50',
                //'district' => 'required|max:50',
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

            if ( !empty($request->latitude) && !empty($request->longitude) ) {
                $input['latitude'] = $request->latitude;
                $input['longitude'] = $request->longitude;
            }

            $user_status = 0;
            $name = $request->first_name. ' '.$request->last_name;

        }
       
        $input = $request->all();

        $verify_otp_time = Carbon::now()->addMinutes(5);

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
   
        $controller = new UserController();
        $language_code = $request->language_code ? $request->language_code : 'he';
        $verify_otp = $controller->send_otp_for_verify_phone($request->email,$name,$language_code);
        
        $input['password'] = Hash::make($input['password']);
        $input['verify_otp'] = $verify_otp;

        $user = User::create($input);

        if ( !empty($user) ) {
            DB::table('user_device')->insert([
                'user_id' =>$user->id,
                'device_token'=>$request->device_token,
                'device_type'=>$request->device_type,
            ]);
        }

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

        if ($language_code == 'en') {
            $send_otp = 'We have sent you One Time Password (OTP) to your registered email address! If you have not received an email please check your Spam or Junk mail folder.';
        }else if($language_code == 'he') {
            $send_otp = 'שלחנו לך לכתובת המייל המעודכנת קוד אימות לסיסמא זמנית!  אם לא קיבלת את האימייל תבדוק בבקשה בשאר התיבות הנכנסות.';
        }else if($language_code == 'ar') {
            $send_otp = 'لقد أرسلنا لك رمز التحقق الخاص بكلمة مرور مؤقتة إلى عنوان البريد الإلكتروني المحدث! إذا لم تستلم البريد الإلكتروني، فيرجى التحقق من صناديق البريد الوارد الأخرى.';
        }
   
        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => $send_otp,
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
        $language_code = $request->language_code ? $request->language_code : 'he';

        if ($language_code == 'en') {
            $login = 'Login Successfully';
            $send_otp = 'We have sent you One Time Password (OTP) to your registered email address! If you have not received an email please check your Spam or Junk mail folder.';
            $user_block = 'User account is blocked';
            $user_active = 'User is not active';
            $invalid_login = 'Invalid email or password';
        }else if($language_code == 'he') {
            $login = 'התחברת בהצלחה';
            $send_otp = 'שלחנו לך לכתובת המייל המעודכנת קוד אימות לסיסמא זמנית!  אם לא קיבלת את האימייל תבדוק בבקשה בשאר התיבות הנכנסות.';
            $user_block = 'חשבון המשתמש חסום';
            $user_active = 'משתמש לא פעיל';
            $invalid_login = 'שגיאה באימייל או בסיסמא';
        }else if($language_code == 'ar') {
            $login = 'لقد قمت بتسجيل الدخول بنجاح';
            $send_otp = 'لقد أرسلنا لك رمز التحقق الخاص بكلمة مرور مؤقتة إلى عنوان البريد الإلكتروني المحدث! إذا لم تستلم البريد الإلكتروني، فيرجى التحقق من صناديق البريد الوارد الأخرى.';
            $user_block = 'تم حظر حساب المستخدم';
            $user_active = 'مستخدم غير نشط';
            $invalid_login = 'خطأ في البريد الإلكتروني أو كلمة المرور';
        }
        if (Auth::attempt(['email' => $request->email, 'password' => ($request->password),'user_status' => ($request->user_status),'is_account_delete' =>0])){ 

            $user = Auth::user(); 
            if ($user->user_status == 0) {
                $name = $user->first_name.' '.$user->last_name;
            } else if ($user->user_status == 1) {
                $name = $user->business_name;
            }

            if ( $user->status == 1) {
                if ( $user->is_block == 0) 
                {
                    if ( $user->is_verified_mobile_no == 1 ) {
                        $msg = $login;
                    } else {
                        $controller = new UserController();
                        $verify_otp = $controller->send_otp_for_verify_phone($request->email,$name,$language_code);
                        $verify_otp_time = Carbon::now()->addMinutes(5);
                        User::where('id',$user->id)->update(['verify_otp'=>$verify_otp,'verify_otp_time'=>$verify_otp_time]);
                        $msg = $send_otp;
                    }

                    if ( !empty($request->latitude) && !empty($request->longitude) ) {
                    User::where('id',$user->id)->update(['latitude'=>$request->latitude,'longitude'=>$request->longitude]);
                    } 

                    $user_device = DB::table('user_device')->where('user_id',$user->id)->first();

                    if ( !empty($user_device) ) {

                        DB::table('user_device')->where('user_id',$user->id)->update
                        ([
                            'device_token'=>$request->device_token,
                            'device_type'=>$request->device_type,
                        ]);

                    } else {
                        DB::table('user_device')->insert
                        ([
                            'user_id' =>$user->id,
                            'device_token'=>$request->device_token,
                            'device_type'=>$request->device_type,
                        ]);
                    }
                        
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
                        'message' => $msg,
                        'status' => 200
                    ]);

                } else {
                    return response()->json([
                        'success' => false,
                        'message' =>$user_block,
                        'status' => 401
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' =>$user_active,
                    'status' => 401
                ]);
            }
        } else { 
            return response()->json([
                'success' => false,
                'message' =>$invalid_login,
                'status' => 401
            ]);
        } 
    }

    public function verify_phone_number(Request $request) 
    {
        $user_id = Auth::user()->id;
        
        $validator = Validator::make($request->all(), [
            // 'phone_number' => 'required',
            'otp' => 'required',
            'email' =>'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 200
            ];
    
            return response()->json($response, 400);
        }

        $user = User::select('*')->where('email',$request->email)->where('id',$user_id)->whereIn('user_status',[0,1])->first();

        if ( empty($user) ) {

            $response = [
                'success' => false,
                'message' => trans('message.valid_email'),
                'status' => 400
            ];
    
            return response()->json($response, 400);

        } else {

            if ( strtotime($user->verify_otp_time) > strtotime(now()) ) 
            {
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
                        'message' => trans('message.email_verified'),
                        'status' => 200
                    ];
            
                    return response()->json($response, 200);
        
                } else {

                    $response = [
                        'success' => false,
                        'message' => trans('message.OTP_incorrect'),
                        'status' => 400
                    ];
            
                    return response()->json($response, 400);
                }

            } else {
                $response = [
                    'success' => false,
                    'message' => trans('message.OTP_expired'),
                    'status' => 400
                ];
        
                return response()->json($response, 400);
            }
        }
    }

    public function send_otp_for_verify_phone($email,$name,$language_code) {

        $title =  Config::get('constants.TITLE');
        			
        $token = rand(100000, 999999);
        $newdata = array('token' => $token, 'name'=>$name, 'language_code' => $language_code);
        if($language_code == 'ar') {
            $subject = "ارجو تاكيد الايميل الخاص بك - مقيم ذكي";
        } else if($language_code == 'he') {
            $subject = "תושב חכם - אשר כתובת אימייל .";
        } else {
            $subject = "Please confirm your email - $title";
        }

        // $env_email = env('MAIL_USERNAME');
        Mail::send('emails.sentotpforverifyphone', $newdata, function($message) use ($email, $subject) {
            $message->to($email)
                ->from('support@toshavhaham.co.il', 'Support -Toshav Haham')
                ->subject($subject);
        });
        return $token;
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
                'message' => trans('message.password_change'),
                'status' => 200
            ]);

        } else {

            return response()->json([
                'success' => false,
                'message' => trans('message.not_match'),
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
            $success['location_url'] =  ($user->location_url != null)?$user->location_url:'';
            $success['profile_pic'] =($user->profile_pic != null)?$user->profile_pic:'';

            $response = [
                'success' => true,
                'data'    => $success,
                'message' => trans('message.user_profile'),
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
                        ->where('is_account_delete','=',0)
                ],
                // 'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                // 'website' => 'required|max:50',
                //'business_activity' => 'required',
                //'business_sector' => 'required',
                //'establishment_year' => 'required',
                //'business_logo' => 'required',
                //'business_hours' => 'required',
                //'street_address_name' => 'required|max:50',
                //'street_number' => 'required',
                //'district' => 'required|max:50',
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
                        ->where('is_account_delete','=',0)
                ],
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                // 'phone_number' =>'required|string|min:10|max:15|regex:/[0-9]{9}/',
                // 'id_number' => 'required|max:20',
                //'marital_status' => 'required',
                //'no_of_child' => 'required',
                //'occupation' => 'required|max:50',
                //'education_level' => 'required',
                //'street_address_name' => 'required|max:50',
                //'street_number' => 'required',
                //'house_number' => 'required',
                //'city' => 'required|max:50',
                //'district' => 'required|max:50',
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
        $PROFILE_PIC = Config::get('constants.PROFILE_PIC');

        $input = $request->all();

        $input['location_url']  = isset($request->location_url) ? $request->location_url:'';

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

        if ($request->user_status == 0) 
        {

            if ($request->hasFile('profile_pic')) {
                $image = $request->file('profile_pic');
                $cover_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/profile_pic';
                $image->move($destinationPath, $cover_image_name);
                $pic = $PROFILE_PIC.$cover_image_name;
                $input['profile_pic']  = $pic;
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
        $success['location_url'] =($user->location_url != null)?$user->location_url:'';
        $success['profile_pic'] =($user->profile_pic != null)?$user->profile_pic:'';

   
        $response = [
            'success' => true,
            'data'    => $success,
            'message' => trans('message.profile_update'),
            'status' => 200
        ];

        return response()->json($response, 200); 
		
    }

    public function forgot_password(Request $request)
    {
        $title =  Config::get('constants.TITLE');

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

        $check_email = User::where('email',$request->email)->where('is_account_delete', 0)->first();
        $language_code = $request->language_code ? $request->language_code : 'en';

        if($language_code == 'ar') {
            $subject = "عادة تعيين كلمة المرور الخاصة بك - لمقيم ذكي";
            $no_data = 'المعلومات غير متوفرة!';
            $block = 'تم حظر حساب المستخدم';
            $send_otp = 'لقد أرسلنا لك رمز التحقق الخاص بكلمة مرور مؤقتة إلى عنوان البريد الإلكتروني المحدث! إذا لم تستلم البريد الإلكتروني، فيرجى التحقق من صناديق البريد الوارد الأخرى.';
            
        } else if($language_code == 'he') {
            $subject = "תושב חכם - אפס סיסמא";
            $no_data = 'המידע לא זמין !';
            $block = 'חשבון המשתמש חסום';
            $send_otp = 'שלחנו לך לכתובת המייל המעודכנת קוד אימות לסיסמא זמנית!  אם לא קיבלת את האימייל תבדוק בבקשה בשאר התיבות הנכנסות.';
        } else {
            $subject = "Reset your password - Toshav Haham";
            $no_data = 'Data not found!';
            $block = 'User Account is blocked';
            $send_otp = 'We have sent you One Time Password (OTP) to your registered email address! If you have not received an email please check your Spam or Junk mail folder.';
        }

        if ( empty($check_email) ) {
			
            return response()->json([
                'success' => false,
                'message' => $no_data,
                'status' => 400
                ]);
        } else {
			
            $check_email_deleted = User::where('email',$request->email)->where('status','=',1)
            ->where('user_status',$request->user_status)->first();

            if ( empty($check_email_deleted) ) {
				
                return response()->json([
                    'success' => false,
                    'message' => $block,
                    'status' => 400
                    ]);
					
            } else {
				
                $token = random_int(0, 999999);
                //$token = Str::random(6);
                //$token = substr(number_format(time() * rand(),0,'',''),0,6);

                $data=[	'email' =>$request->email,
						'token' =>$token,
						'created_at' =>date('Y-m-d H:i:s') ];
        
                DB::table('password_resets')->insert($data);
                $newdata = array('token' => $token, 'name'=>$check_email_deleted->name, 'language_code' => $language_code);
             
                // $env_email = env('MAIL_USERNAME');
                Mail::send('emails.forgotpassword', $newdata, function($message) use ($request, $subject) {
                    $message->to($request->email)
                        ->from('support@toshavhaham.co.il', 'Support -Toshav Haham')
                        ->subject($subject);
                });

                return response()->json([
                    'success' => true,
                    'message' => $send_otp,
                    'status'=>200
                ]);
            }
        }
       
    }

    public function logout(Request $request)
    {
        $user = auth()->user();

        $user_device = DB::table('user_device')->where('user_id',$user->id)->first();

        if ( !empty($user_device) ) {

            DB::table('user_device')->where('user_id',$user->id)->update
            ([
                'device_token'=>'',
                'device_type'=>'',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' =>trans('message.logout'),
            'status'=>200
        ]);
    }

    public function resend_otp(Request $request)
    {
        $user = auth()->user();

        if ($user->user_status == 0) {
            $name = $user->first_name.' '.$user->last_name;
        } else if ($user->user_status == 1) {
            $name = $user->business_name;
        }

        $email = $user->email;

        $controller = new UserController();
        $verify_otp = $controller->send_otp_for_verify_phone($email,$name);

        $userRes = User::where('id',$user->id)->first();
        $verify_otp_time = Carbon::now()->addMinutes(5);

        DB::table('users')->where('id',$user->id)->update
        ([
            'verify_otp' => $verify_otp,
            'verify_otp_time' => $verify_otp_time
        ]);

        return response()->json([
            'success' => true,
            'message' =>trans('message.OTP_send'),
            'status'=>200
        ]);
    }

    public function delete_account(Request $request)
    {
        $user = auth()->user();

        DB::table('users')->where('id',$user->id)->update
        ([
            'is_account_delete' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' =>trans('message.user_delete'),
            'status'=>200
        ]);
    }
}