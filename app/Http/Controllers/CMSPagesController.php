<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSPages;
use Redirect,Response,DB,Validator;

class CMSPagesController extends Controller {

    protected $route_name;
    protected $module_singular_name;

    public function __construct() {
        $this->route_name = 'cms_pages';
        $this->module_singular_name = 'CMSPage';

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

        $title = !empty($request->get("title")) ? $request->get("title") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';
       
        $sidx = 'id';

        $list_query = CMSPages::select("*");

        if (!empty($title)) {
            $list_query = $list_query->where('title', "LIKE", "%" . $title . "%")->orWhere('title_ab', "LIKE", "%" . $title . "%")->orWhere('title_he', "LIKE", "%" . $title . "%");
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

                $all_records[$index]['title'] = $value->title;

                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" '.$checked.' data-id="'.$value->id.'" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['edit'] = '<a href="' . route($this->route_name . ".edit", $value->id  ) . '" class="btn btn-light edit_category" data-id="'.$value->id . '">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'.$value->id . '">Delete</button>';

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
        $cms_id  = $request->id ;
   
        $validator = Validator::make($request->all(),[
            "title" => "required",
            "title_ab" => "required",
            "title_he" => "required",
            'content'=>"required",
            'content_ab'=>"required",
            'content_he'=>"required",
        ]);

        if($validator->fails())
        {
            return back()->with(['errors' => $validator->errors()]);
        }

        $add_new_cms = array(
            "title" => $request->get("title"),
            "title_ab" => $request->get("title_ab"),
            "title_he" => $request->get("title_he"),
            'content'=>$request->get("content"),
            'content_ab'=>$request->get("content_ab"),
            'content_he'=>$request->get("content_he"),
            "status" => 1
        );

        CMSPages::updateOrCreate(['id' => $cms_id ],$add_new_cms);

        if ( empty($cms_id) )
        {
            $msg = 'CMS Pages Added Successfully.';
        } else {
            $msg = 'CMS Pages Update Successfully';
        }

        return redirect()->route($this->route_name . ".index")->with("success", $msg);
    }


    public function edit($id) 
    {
        $cms = CMSPages::where('id',$id)->first();
        return view($this->route_name . ".edit", ['cms' =>$cms]);
    }

    public function change_status(Request $request) 
    {
        $id = $request->get("id");
        $status = $request->get("status");

        $find_record = CMSPages::find($id);

        $response = array("success" => false, "message" => "Problem while change status");

        if ($find_record) {

            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = "CMS Pages has been actived";
            } else {
                $message = "CMS Pages has been inactived";
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }

    public function destroy(Request $request) 
    {
        $id = $request->get("id");
        $find_record = CMSPages::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {

            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name . " deleted successfully";
        }

        return $response;
    }

}
