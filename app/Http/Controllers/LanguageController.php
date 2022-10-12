<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Hash,Redirect,Response,DB;
use Illuminate\Validation\Rule;

class LanguageController extends Controller {

    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct() {
        $this->route_name = 'language';
        $this->module_singular_name = 'Language';
        $this->module_plural_name = 'Languages';

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

        $language_name = !empty($request->get("language_name")) ? $request->get("language_name") : '';
        $language_code = !empty($request->get("language_code")) ? $request->get("language_code") : '';

        if ($sidx == 0) {
            $sidx = 'language_name';
        } else if ($sidx == 1) {
            $sidx = 'language_code';
        } else {
            $sidx = 'language_id';
        }


        $list_query = Language::select("*");
   
        if (!empty($language_name) ) {
            $list_query = $list_query->where("language_name", "LIKE", "%" . $language_name . "%");
        }
        if (!empty($language_code)) {
            $list_query = $list_query->where("language_code", "LIKE", "%" . $language_code . "%");
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

                $all_records[$index]['language_name'] = $value->language_name;

                $all_records[$index]['language_code'] = $value->language_code;

                $all_records[$index]['edit'] = '<a href="#" class="btn btn-light edit_language" data-id="'. $value->language_id.'">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'. $value->language_id.'">Delete</button>';

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
            'language_name' => 'required|max:50',
            'language_code' => 'required',
        ]);


        $add_new_lan = array(
            "language_name" => $request->get("language_name"),
            "language_code" => $request->get("language_code"),
        );

        $language_id = $request->language_id;

        Language::updateOrCreate(['language_id' => $language_id],['language_name' => $request->language_name, 'language_code' => $request->language_code]);


        if ( empty($language_id) )
        {
            $msg = 'Language Added Successfully.';
        } else {
            $msg = 'Language Update Successfully';
        }
        return redirect()->route('language.index')->with('success',$msg);

    }

    public function edit($id) 
    {
        $language = Language::where('language_id',$id)->first();
        return Response::json($language);
        // return view($this->route_name.".edit", ['language' => $language]);
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
        $find_record = Language::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name . " deleted successfully";
        }

        return $response;
    }

}
