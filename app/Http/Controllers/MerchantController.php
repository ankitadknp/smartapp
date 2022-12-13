<?php

namespace App\Http\Controllers;

use App\User;
use App\BlogReport;
use App\BlogComment;
use App\BlogLike;
use App\BlogCommentLike;
use App\PublicFeedReport;
use App\PublicFeedComment;
use App\PublicFeedLike;
use App\PublicFeedCommentLike;
use App\Share;
use App\Coupon;
use App\ClientMyCoupon;
use App\SmartCards;
use App\CouponQRcode;
use App\CouponTerm;
use Illuminate\Http\Request;
use Redirect,Response,DB,Validator,Hash,File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;

class MerchantController extends Controller
{
    protected $route_name;
    protected $module_singular_name;

    public function __construct()
    {
        $this->route_name = 'merchant';
        $this->middleware("checkmodulepermission");
    }

    public function index()
    {
        return view($this->route_name.'.index');
    }

    public function load_data_in_table(Request $request)
    {
        $page = !empty($request->get('start')) ? $request->get('start') : 0;
        $rows = !empty($request->get('length')) ? $request->get('length') : 10;
        $draw = !empty($request->get('draw')) ? $request->get('draw') : 1;

        $sidx = !empty($request->get('order')[0]['column']) ? $request->get('order')[0]['column'] : 0;
        $sord = !empty($request->get('order')[0]['dir']) ? $request->get('order')[0]['dir'] : 'DESC';

        $business_name = !empty($request->get('business_name')) ? $request->get('business_name') : '';
        $email = !empty($request->get('email')) ? $request->get('email') : '';
        $phone_number = !empty($request->get('phone_number')) ? $request->get('phone_number') : '';
        $status = !empty($request->get('status')) ? $request->get('status') : '';

        $sidx = 'id';

        $list_query = User::select("*")->where('user_status','=','1');

        if (!empty($business_name)) {
            $list_query = $list_query->where('business_name', 'LIKE', '%'.$business_name.'%');
        }
        if (!empty($email)) {
            $list_query = $list_query->where('email', 'LIKE', '%'.$email.'%');
        }
        if (!empty($phone_number)) {
            $list_query = $list_query->where('phone_number', 'LIKE', '%'.$phone_number.'%');
        }
        if (!empty($status)) {
            $list_query = $list_query->where('status', '=', $status);
        }

        $total_rows = $list_query->count();
        $all_records = array();

        if ($total_rows > 0)
        {
            $list_of_all_data = $list_query->skip($page)
                ->orderBy($sidx, $sord)
                ->take($rows)
                ->get();
            $index = 0;

            foreach ($list_of_all_data as $value) {
                $all_records[$index]['business_name'] = $value->business_name;
                $all_records[$index]['email'] = $value->email;
                $all_records[$index]['phone_number'] = $value->phone_number;
                
                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" '.$checked.' data-id="'.$value->id.'" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['edit'] = '<a href="'.route($this->route_name.'.edit', $value->id).'" class="btn btn-light edit_merchant" data-id="'.$value->id.'">Edit</a>';

                $all_records[$index]['view'] = '<a href="'.route($this->route_name.'.show', $value->id).'" class="btn btn-light edit_merchant" data-id="'.$value->id.'">View</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'.$value->id.'">Delete</button>';

                ++$index;
            }
        }
        $response = [];
        $response['draw'] = (int) $draw;
        $response['recordsTotal'] = (int) $total_rows;
        $response['recordsFiltered'] = (int) $total_rows;
        $response['data'] = $all_records;

        return $response;
    }

    public function create()
    {
        return view($this->route_name . ".add");
    }

    public function store(Request $request)
    {
        $user_id  = $request->user_id ;
        $STORE_IMGAE_URL =  Config::get('constants.BUSINESS_LOGO_URL');

        if ( empty($user_id) )
        {
            $request->validate([
                'business_name' => 'required|max:50',
                'registration_number' => 'required|max:30',
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')
                        ->where('user_status', 1)
                ],
                'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'website' => 'required|max:50',
                'business_activity' => 'required',
                'business_sector' => 'required',
                'establishment_year' => 'required',
                'business_logo' => 'required',
                'business_hours_to' => 'required',
                'business_hours_from' => 'required',
                'street_address_name' => 'required|max:50',
                'street_number' => 'required',
                'district' => 'required|max:50',
            ]);
            
            if ($request->hasFile('business_logo')) {
                 $image = $request->file('business_logo');
                $cover_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/business_logo';

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
            
                $image->move($destinationPath, $cover_image_name);
                $business_logo = $STORE_IMGAE_URL.$cover_image_name;
                
            }

            $pwd = Hash::make($request->get('password'));

            $msg = 'Merchant Added Successfully.';
        } else 
        {
            $request->validate([
                'business_name' => 'required|max:50',
                'registration_number' => 'required|max:30',
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')->ignore($user_id)
                        ->where('user_status', 1)
                ],
                'phone_number' => 'required|string|min:10|max:15|regex:/[0-9]{9}/',
                'website' => 'required|max:50',
                'business_activity' => 'required',
                'business_sector' => 'required',
                'establishment_year' => 'required',
                'business_hours_to' => 'required',
                'business_hours_from' => 'required',
                'street_address_name' => 'required|max:50',
                'street_number' => 'required',
                'district' => 'required|max:50',
            ]);

            $user_data = User::where('id',$user_id)->first();

            if ($request->hasFile('business_logo')) {
                $image = $request->file('business_logo');
                $cover_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/business_logo';
                $image->move($destinationPath, $cover_image_name);
                $business_logo = $STORE_IMGAE_URL.$cover_image_name;
            } else {
                $business_logo = $user_data->business_logo;
            }


            $pwd = $user_data->password;

            $msg = 'Merchant Update Successfully';
        }

        $add_new = [
            'business_name' => $request->get('business_name'),
            'registration_number' => $request->get('registration_number'),
            'email' => $request->get('email'),
            'password' =>$pwd ,
            'phone_number' => $request->get('phone_number'),
            'website' => $request->get('website'),
            'business_activity' => $request->get('business_activity'),
            'business_sector' => $request->get('business_sector'),
            'establishment_year' => $request->get('establishment_year'),
            'business_hours' => $request->get('business_hours_from').' to '.$request->get('business_hours_to'),
            'street_address_name' => $request->get('street_address_name'),
            'street_number' => $request->get('street_number'),
            'district' => $request->get('district'),
            'business_logo' => $business_logo,
            'status' => 1,
            'user_status' =>1,
        ];

        
        User::updateOrCreate(['id' => $user_id ],$add_new);

        return redirect()->route($this->route_name.'.index')->with('success', $msg);

    }

    public function change_status(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');

        $find_record = User::find($id);

        $response = ['success' => false, 'message' => 'Problem while change status'];

        if ($find_record) {
            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = 'Merchant has been unblocked';
            } else {
                $message = 'Merchant has been blocked';
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view($this->route_name.'.edit')->with(['user' => $user]);
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');

        $find_record = User::find($id);

        $response = ['success' => false, 'message' => 'Problem while deleting this record'];

        if ($find_record) 
        {
            $blog_like = BlogLike::where('user_id',$id)->get();
            $blog_report = BlogReport::where('user_id',$id)->get();
            $blog_comment = BlogComment::where('user_id',$id)->get();
            $blog_comment_like = BlogCommentLike::where('user_id',$id)->get();

            $feed_like = PublicFeedLike::where('user_id',$id)->get();
            $feed_report = PublicFeedReport::where('user_id',$id)->get();
            $feed_comment = PublicFeedComment::where('user_id',$id)->get();
            $feed_comment_like = PublicFeedCommentLike::where('user_id',$id)->get();

            // $mycoupon = ClientMyCoupon::where('user_id',$id)->get();
            // $share = Share::where('user_id', $id)->get();
            $Coupon = Coupon::where('user_id',$id)->get();
            $smartcard = SmartCards::where('user_id',$id)->get();
            $device = DB::table('user_device')->where('user_id',$id)->first();

            if ( !empty($blog_like) ) 
            {
                BlogLike::where('user_id',$id)->delete();
            }
            if ( !empty($blog_report) ) 
            {
                BlogReport::where('user_id',$id)->delete();
            }
            if ( !empty($blog_comment) ) 
            {
                BlogComment::where('user_id',$id)->delete();
            }
            if ( !empty($blog_comment_like) ) 
            {
                BlogCommentLike::where('user_id',$id)->delete();
            }

            if ( !empty($feed_like) ) 
            {
                PublicFeedLike::where('user_id',$id)->delete();
            }
            if ( !empty($feed_report) ) 
            {
                PublicFeedReport::where('user_id',$id)->delete();
            }
            if ( !empty($feed_comment) ) 
            {
                PublicFeedComment::where('user_id',$id)->delete();
            }
            if ( !empty($feed_comment_like) ) 
            {
                PublicFeedCommentLike::where('user_id',$id)->delete();
            }


            if (!empty($Coupon)) 
            {
                foreach ($Coupon as $val ) {
                    Coupon::where('coupon_id',$val->coupon_id)->delete();
                    
                    $qrcode = CouponQRcode::where('coupon_id',$val->coupon_id)->first();
                    $mycoupon = ClientMyCoupon::where('coupon_id',$val->coupon_id)->get();
                    $share = Share::where('key', 'coupon_id')->where('value', $val->coupon_id)->get();
                    $term = CouponTerm::where('coupon_id',$val->coupon_id)->get();

                    if ($share != '[]') 
                    {
                        Share::where('key', 'coupon_id')->where('value', $val->coupon_id)->delete();
                    }
                    if ( $term != '[]') 
                    {
                        CouponTerm::where('coupon_id',$val->coupon_id)->delete();
                    }
                    if ($mycoupon != '[]') 
                    {
                        ClientMyCoupon::where('coupon_id',$val->coupon_id)->delete();
                    }
                    if ( !empty($qrcode)) 
                    {
                        $destinationPath = public_path("/");
                        $new_path = substr($qrcode->qrcode_file, strpos($qrcode->qrcode_file, "qrcodes/") );  
                        $image_path = $destinationPath.$new_path;
                
                        if (File::exists($image_path)) {
                            unlink($image_path);
                        }
                        CouponQRcode::where('coupon_id',$val->coupon_id)->delete();
                    }
                }
               
            }     
       
            if (!empty($smartcard)) 
            {
                SmartCards::where('user_id', $id)->delete();
            }
            if (!empty($device)) 
            {
                DB::table('user_device')->where('user_id',$id)->delete();
            }
            
            $find_record->delete();
            $response['success'] = true;
            $response['message'] = $this->module_singular_name.' deleted successfully';
        }

        return $response;
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view($this->route_name.'.show')->with(['user' => $user]);
    }

}
