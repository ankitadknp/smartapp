<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller {

    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct() {
        $this->route_name = 'categories';
        $this->module_singular_name = 'Category';
        $this->module_plural_name = 'Category';

        // $this->middleware("checkmodulepermission", ['except' => []]);
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

        $name = !empty($request->get("category_name")) ? $request->get("category_name") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';

        if ($sidx == 0) {
            $sidx = 'category_name';
        } else {
            $sidx = 'category_id';
        }

        $list_query = Category::select("*");

        if (!empty($name)) {
            $list_query = $list_query->where('category_name', "LIKE", "%" . $name . "%");
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
                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" '.$checked.' data-id="'.$value->category_id.'" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['edit'] = '<a href="' . route($this->route_name . ".edit", $value->category_id ) . '" class="btn btn-light">Edit</a>';

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view($this->route_name . ".add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $request->validate([
            "category_name" => "required|unique:category,category_name,NULL,category_id",
        ]);

        $add_new_category = array(
            "category_name" => $request->get("category_name"),
            "status" => 1
        );

        $added = Category::create($add_new_category);

        return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Added Successfully");
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        return view($this->route_name . ".edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) 
    {

        $request->validate([
            "category_name" => "required|unique:category,category_name,$category->category_id ,category_id",
        ]);


        $category->category_name = $request->get("category_name");

        $added_category = $category->update();

        return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Update Successfully");
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
