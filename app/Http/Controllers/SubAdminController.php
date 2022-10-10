<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use DB;
use Illuminate\Validation\Rule;

class SubAdminController extends Controller {

    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct() {
        $this->route_name = 'sub_admin';
        $this->module_singular_name = 'User';
        $this->module_plural_name = 'Users';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view($this->route_name . ".index");
    }

    public function load_data_in_table(Request $request) {

        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'ASC';

        $name = !empty($request->get("name")) ? $request->get("name") : '';
        $email = !empty($request->get("email")) ? $request->get("email") : '';
        $mobileno = !empty($request->get("mobileno")) ? $request->get("mobileno") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';

        if ($sidx == 0) {
            $sidx = 'first_name';
        } else if ($sidx == 1) {
            $sidx = 'email';
        } else {
            $sidx = 'id';
        }


        $list_query = User::select("*", DB::raw("CONCAT(first_name, ' ', last_name) AS 
        name"))->where('user_status','=',4);
   
        if (!empty($name) ) {
            $list_query = $list_query->where("first_name", "LIKE", "%" . $name . "%");
        }
        if (!empty($email)) {
            $list_query = $list_query->where("email", "LIKE", "%" . $email . "%");
        }
        if (!empty($status)) {
            $list_query = $list_query->where("status", "=", $status);
        }

        $total_rows = $list_query->count();
        $all_records = array();

        if ($total_rows > 0) {
            $list_of_all_data = $list_query->skip($page)
                    ->orderBy($sidx, $sord)
                    ->take($rows)
                    ->get();
            $index = 0;

            foreach ($list_of_all_data as $value) {

                $all_records[$index]['name'] = $value->name ;

                $all_records[$index]['email'] = $value->email;

                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" ' . $checked . ' data-id="' . $value->id . '" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['edit'] = '<a href="' . route($this->route_name.".edit", $value->id).'" class="btn btn-light">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="' . $value->id . '">Delete</button>';

                $index++;
            }
        }
        $response = array();
        $response['draw'] = (int) $draw;
        $response['recordsTotal'] = (int) $total_rows;
        $response['recordsFiltered'] = (int) $total_rows;
        $response['data'] = $all_records;

        return $response;
    }

    public function create() {
        return view($this->route_name . ".add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            "email" => "email|unique:users,email,NULL,id",
            'first_name' => 'required',
            'last_name' => 'required',
            "password" => "required",
        ]);


        $add_new_user = array(
            "first_name" => $request->get("first_name"),
            "last_name" => $request->get("last_name"),
            "email" => $request->get("email"),
            "password" => Hash::make($request->get("password")),
            'user_status' =>4,
            'status'=>1
        );

        $added_user = User::create($add_new_user);

        return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Added Successfully");
    }

    public function change_status(Request $request) 
    {
        $id = $request->get("id");
        $status = $request->get("status");

        $find_record = User::find($id);

        $response = array("success" => false, "message" => "Problem while change status");

        if ($find_record) {
            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = "User has been unblocked";
            } else {
                $message = "User has been blocked";
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }

 
    public function edit(User $user,$id) 
    {
        $user=User::where('id',$id)->first();
        return view($this->route_name.".edit", ['user' => $user]);
    }

    public function update(Request $request, User $user,$id) 
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)
                    ->where('user_status', 4)
            ],
        ]);

        $user=User::where('id',$id)->first();

        $user->first_name = $request->get("first_name");
        $user->last_name = $request->get("last_name");
        $user->email = $request->get("email");

        $added_user = $user->update();
     
        return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $id = $request->get("id");
        $find_record = User::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name . " deleted successfully";
        }

        return $response;
    }

}
