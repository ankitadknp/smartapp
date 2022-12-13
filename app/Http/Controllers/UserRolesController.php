<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRoles;
use App\User;
use App\UserPermission;
use DB,Auth;
use Illuminate\Support\Facades\Session;

class UserRolesController extends Controller {

    public function __construct() {
        $this->route_name = 'user-roles';

        $module_permissions = \Session::get("user_access_permission");
        $module_permission = !empty($module_permissions['user-roles']) ? $module_permissions['user-roles'] : array();
        $this->can_view_other_data = !empty($module_permission['can_view_other_data']) ? true : false;
    }

    public function index() {
        return view("user_roles.index");
    }

    public function load_data_in_table(Request $request) {

        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'ASC';

        $name = !empty($request->get("name")) ? $request->get("name") : '';

        $list_of_all_user_roles = UserRoles::leftJoin('users', function ($join) {
            $join->on('user_roles.user_id', '=', 'users.id');
        })->select('user_roles.id',DB::raw("CONCAT(first_name,' ',last_name) as name"))
        ->where('user_status',4)->orderby('user_roles.id','DESC');

        if (!empty($name)) {
            $list_of_all_user_roles = $list_of_all_user_roles->where("name", "LIKE", "%" . $name . "%");
        }

        $total_rows = $list_of_all_user_roles->count();
        $list_of_all_user_roles_array = array();
        if ($total_rows > 0) {
            $list_of_all_user_roles_data = $list_of_all_user_roles->skip($page)
                    ->take($rows)
                    ->get();
            $index = 0;
            foreach ($list_of_all_user_roles_data as $user_role) {
                $list_of_all_user_roles_array[$index]['name'] = $user_role->name;
                $list_of_all_user_roles_array[$index]['edit'] = '
                    <a href="'.route($this->route_name.'.edit', $user_role->id).'" class="btn btn-light">Edit  Permission</a>
                ';
                if ($user_role->id == 1) {
                    $list_of_all_user_roles_array[$index]['delete'] = '';
                } else {
                    $list_of_all_user_roles_array[$index]['delete'] = '
                    <button type="button" class="btn btn-danger delete_data_button" data-id="' . $user_role->id . '">Delete</button>
                ';
                }

                $index++;
            }
        }

        $response = array();
        $response['draw'] = (int) $draw;
        $response['recordsTotal'] = (int) $total_rows;
        $response['recordsFiltered'] = (int) $total_rows;
        $response['data'] = $list_of_all_user_roles_array;

        return $response;
    }

    public function create() {
        $all_avilable_role_permissions = UserPermission::get();
        $user = User::select('id',DB::raw("CONCAT(first_name, ' ', last_name) as name"))->where('user_status','=',4)->where('status','=',1)->get();
        return view("user_roles.add")
        ->with(array(
            "all_avilable_role_permissions" => $all_avilable_role_permissions,
            'user'=>$user
        ));
    }

    public function store(Request $request) {
        $request->validate([
            'user' => 'required',
            "role_permissions" => "required"
        ]);

        $user_id = $request->get("user");
        $role_permissions = $request->get("role_permissions");

        $add_new_role = array(
            "user_id" => $user_id,
            "role_type" => 4,
            "role_permissions" => json_encode($role_permissions),
        );

        $added_role = UserRoles::create($add_new_role);
        if ($added_role) {
            return redirect()->route("user-roles.index")->with("success", "User Permission Added Successfully");
        } else {
            return back()->withInput();
        }
    }

    public function edit(UserRoles $user_role) {
        $all_avilable_role_permissions = UserPermission::get();

        $list_of_other_roles = UserRoles::where("id",$user_role->id)->first();

        $selected_permissions = json_decode($user_role->role_permissions, true);

        $user = User::select('id',DB::raw("CONCAT(first_name, ' ', last_name) as name"))->where('user_status','=',4)->where('status','=',1)->get();

        return view("user_roles.edit")
                        ->with(array(
                            "all_avilable_role_permissions" => $all_avilable_role_permissions,
                            "user_role" => $user_role,
                            "list_of_other_roles" => $list_of_other_roles,
                            'user'=>$user
        ));
    }

    public function update(Request $request, UserRoles $user_role) {
        $request->validate([
            'user' => 'required',
            "role_permissions" => "required"
        ]);

        $user_role->user_id = $request->get("user");
        $user_role->role_permissions = json_encode($request->get("role_permissions"));
        $added_role = $user_role->save();
        if ($added_role) {
            // DB::table('sessions')
            // ->where('user_id', $user_role->user_id)
            // ->delete();
            
            return redirect()->route("user-roles.index")->with("success", "User Permission Updated Successfully");

        } else {
            return back()->withInput();
        }
    }

    public function destroy(Request $request) {
        $role_id = $request->get("id");
        $user_role = UserRoles::find($role_id);
        $response = array("success" => false, "message" => "Problem while delete this role");
        if ($user_role) {
            $user_role->delete();

            $response['success'] = true;
            $response['message'] = "User Permission deleted successfully";
        }

        return $response;
    }

}
