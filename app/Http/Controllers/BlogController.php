<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogReport;

class BlogController extends Controller {

    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct() {
        $this->route_name = 'blog';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $all_avilable_category = \App\Category::where("status", 1)->select("category_id", "category_name")->get();
        return view($this->route_name.".index")->with(array("all_avilable_category" => $all_avilable_category));
    }

    public function load_data_in_table(Request $request) 
    {
        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'ASC';

        $category_id = !empty($request->get("category_id")) ? $request->get("category_id") : '';
        $blog_title = !empty($request->get("blog_title")) ? $request->get("blog_title") : '';
        $blog_content = !empty($request->get("blog_content")) ? $request->get("blog_content") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';

        if ($sidx == 0) {
            $sidx = 'category_id';
        } else if ($sidx == 1) {
            $sidx = 'blog_title';
        } else {
            $sidx = 'blog_id';
        }

        $list_query = Blog::leftJoin('category', function($join) {
            $join->on('blog.category_id', '=', 'category.category_id');
        })
        ->select("blog.*",'category.category_name');

        if (!empty($blog_title)) {
            $list_query = $list_query->where('blog_title', "LIKE", "%" . $blog_title . "%");
        }
      
        if (!empty($status)) {
            $list_query = $list_query->where("blog.status", "=", $status);
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

                $all_records[$index]['category_id'] = $value->category_name;
                $all_records[$index]['blog_title'] = $value->blog_title;
                $checked = '';

                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" ' . $checked . ' data-id="' . $value->blog_id  . '" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['view'] = '<a href="#" data-toggle="modal" data-target="#myModal" data-id="'.$value->blog_id  .'" class="btn btn-light show_modal">View</a>';

                $all_records[$index]['edit'] = '<a href="' . route($this->route_name . ".edit", $value->blog_id ) . '" class="btn btn-light">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="' . $value->blog_id . '">Delete</button>';

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
        $all_avilable_category = \App\Category::where("status", 1)->select("category_id", "category_name")->get();
        return view($this->route_name . ".add")->with(array("all_avilable_category" => $all_avilable_category));
    }

    public function store(Request $request) {

        $request->validate([
            "blog_title" => "required",
            "category" => "required",
            "blog_content" => "required",
        ]);

        $add_new_blog = array(
            "blog_title" => $request->get("blog_title"),
            "category_id" => $request->get("category"),
            'blog_content' => $request->get("blog_content"),
            'status' =>1
        );

        $added_blog = Blog::create($add_new_blog);

        if ($added_blog) {

            $blog_id  = $added_blog->blog_id ;

            return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Added Successfully");

        } else {
            return back()->withInput();
        }
    }

    public function change_status(Request $request) 
    {

        $id = $request->get("id");
        $status = $request->get("status");

        $find_record = Blog::find($id);

        $response = array("success" => false, "message" => "Problem while change status");

        if ($find_record) 
        {
            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = "Blog has been unblocked";
            } else {
                $message = "Blog has been blocked";
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }


    public function edit(Blog $blog) {
        $all_avilable_category = \App\Category::where("status", 1)
        ->select("category_id", "category_name")
        ->get();
        return view($this->route_name . ".edit")->with(
            array("all_avilable_category" => $all_avilable_category,
                "blog" => $blog));
    }


    public function update(Request $request, Blog $blog) {

        $request->validate([
            'blog_title' => 'required',
            'category' => 'required',
        ]);

        $blog->category_id = $request->get("category");
        $blog->blog_title = $request->get("blog_title");
        $blog->blog_content =  $request->get("blog_content") ? $request->get("blog_content") : $blog->blog_content;


        $added_blog = $blog->update();

        if ($added_blog) {

            $blog_id  = $blog->blog_id;

            return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Update Successfully");

        } else {
            return back()->withInput();
        }
    }

    public function destroy(Request $request) {

        $id = $request->get("id");

        $find_record = Blog::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name . " deleted successfully";
        }

        return $response;
    }

   
    public function show(Request $request) 
    {
        $id = $request->get("id");
        $blog = BlogReport::where('blog_id','=',$id)->get();

        $blog_report = [];

        foreach ($blog as $val)
        {
            $report = $val->report;
            $blog_report[] = $report;
        }
        return $blog_report;

    }   
}
