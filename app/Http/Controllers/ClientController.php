<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Redirect,Response,DB,Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;

class ClientController extends Controller
{
    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct()
    {
        $this->route_name = 'client';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $first_name = !empty($request->get('first_name')) ? $request->get('first_name') : '';
        $last_name = !empty($request->get('last_name')) ? $request->get('last_name') : '';
        $email = !empty($request->get('email')) ? $request->get('email') : '';
        $phone_number = !empty($request->get('phone_number')) ? $request->get('phone_number') : '';
        $status = !empty($request->get('status')) ? $request->get('status') : '';

        $sidx = 'id';

        $list_query = User::select("*")->where('user_status','=',0);

        if (!empty($first_name)) {
            $list_query = $list_query->where('first_name', 'LIKE', '%'.$first_name.'%');
        }
        if (!empty($last_name)) {
            $list_query = $list_query->where('last_name', 'LIKE', '%'.$last_name.'%');
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
        $all_records = [];

        if ($total_rows > 0)
        {
            $list_of_all_data = $list_query->skip($page)
                    ->orderBy($sidx, $sord)
                    ->take($rows)
                    ->get();
            $index = 0;

            foreach ($list_of_all_data as $value) {
                $all_records[$index]['first_name'] = $value->first_name;
                $all_records[$index]['last_name'] = $value->last_name;
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

                $all_records[$index]['edit'] = '<a href="#" class="btn btn-light edit_client" data-id="'.$value->id.'">Edit</a>';

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
            $validator = Validator::make($request->all(),[
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')
                        ->where('user_status',0)
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
            ]);
            $msg = 'Client Added Successfully.';
        } else 
        {
            $validator = Validator::make($request->all(),[
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    Rule::unique('users')->ignore($id)
                        ->where('user_status', 0)
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

            $msg = 'Client Update Successfully';
        }

        if($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }

        $add_new = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'phone_number' => $request->get('phone_number'),
            'id_number' => $request->get('id_number'),
            'marital_status' => $request->get('marital_status'),
            'no_of_child' => $request->get('no_of_child'),
            'occupation' => $request->get('occupation'),
            'education_level' => $request->get('education_level'),
            'house_number' => $request->get('house_number'),
            'street_address_name' => $request->get('street_address_name'),
            'street_number' => $request->get('street_number'),
            'district' => $request->get('district'),
            'city' => $request->get('city'),
            'status' => 1,
            'user_status' =>0,
        ];

        
        User::updateOrCreate(['id' => $user_id ],$add_new);

        return response()->json(
            [
                'success' => true,
                'message' => $msg
            ]
        );

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
                $message = 'Blog has been unblocked';
            } else {
                $message = 'Blog has been blocked';
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return Response::json($user);
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');

        $find_record = User::find($id);

        $response = ['success' => false, 'message' => 'Problem while deleting this record'];

        if ($find_record) 
        {
            $find_record->delete();
            $response['success'] = true;
            $response['message'] = $this->module_singular_name.' deleted successfully';
        }

        return $response;
    }

}
