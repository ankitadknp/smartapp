<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Redirect,Response,DB,Validator;

class CategoriesController extends Controller {

    protected $route_name;
    protected $module_singular_name;

    public function __construct() {
        $this->route_name = 'categories';
        $this->module_singular_name = 'Category';
        $this->middleware("checkmodulepermission");
    }

    public function index() {
        return view($this->route_name . ".index");
    }

    public function load_data_in_table(Request $request) {

        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'DESC';

        $name = !empty($request->get("category_name")) ? $request->get("category_name") : '';
        $type = !empty($request->get("type")) ? $request->get("type") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';
       
        $sidx = 'category_id';

        $list_query = Category::select("*");

        if (!empty($name)) {
            $list_query = $list_query->where('category_name', "LIKE", "%" . $name . "%")->orWhere('category_name_ab', "LIKE", "%" . $name . "%")->orWhere('category_name_he', "LIKE", "%" . $name . "%");
        }
        if (!empty($type)) {
            $list_query = $list_query->where('type', "=" , $type );
        }
        if (!empty($status)) {
            $list_query = $list_query->where("status", "=", $status);
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

                $all_records[$index]['category_name'] = $value->category_name;
                $all_records[$index]['type'] = $value->type;


                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" '.$checked.' data-id="'.$value->category_id.'" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['edit'] = '<a href="#" class="btn btn-light edit_category" data-id="'.$value->category_id . '">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'.$value->category_id . '">Delete</button>';

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

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            "category_name" => "required",
            "category_name_ab" => "required",
            "category_name_he" => "required",
            'type'=>"required"
        ]);

        if($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }

        $add_new_category = array(
            "category_name" => $request->get("category_name"),
            "category_name_ab" => $request->get("category_name_ab"),
            "category_name_he" => $request->get("category_name_he"),
            'type'=>$request->get("type"),
            "status" => 1
        );

        $category_id  = $request->category_id ;

        Category::updateOrCreate(['category_id' => $category_id ],$add_new_category);

        if ( empty($category_id) )
        {
            $msg = 'Category Added Successfully.';
        } else {
            $msg = 'Category Update Successfully';
        }

        return response()->json(
            [
                'success' => true,
                'message' => $msg
            ]
        );
    }

    public function edit($id) 
    {
        $category = Category::where('category_id',$id)->first();
        return Response::json($category);
    }

    public function change_status(Request $request) 
    {
        $id = $request->get("id");
        $status = $request->get("status");

        $find_record = Category::find($id);

        $response = array("success" => false, "message" => "Problem while change status");

        if ($find_record) {

            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = "Category has been unblocked";
            } else {
                $message = "Category has been blocked";
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }

    public function destroy(Request $request) 
    {
        $id = $request->get("id");
        $find_record = Category::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {

            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name . " deleted successfully";
        }

        return $response;
    }

}
