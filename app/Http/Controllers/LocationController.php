<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Validator,Response;

class LocationController extends Controller 
{
    protected $route_name;
    protected $module_singular_name;

    public function __construct() {
        $this->route_name = 'locations';
        $this->module_singular_name = 'Location';

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

        $city_area = !empty($request->get("city_area")) ? $request->get("city_area") : '';
        $area_code = !empty($request->get("area_code")) ? $request->get("area_code") : '';

        $sidx = 'id';

        $list_query = Location::select("*");
   
        if (!empty($city_area) ) {
            $list_query = $list_query->where("city_area", "LIKE", "%" . $city_area . "%");
        }
        if (!empty($area_code)) {
            $list_query = $list_query->where("area_code", "LIKE", "%" . $area_code . "%");
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

                $all_records[$index]['city_area'] = $value->city_area;

                $all_records[$index]['area_code'] = $value->area_code;

                $all_records[$index]['edit'] = '<a href="#" class="btn btn-light edit_location" data-id="'. $value->id.'">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'. $value->id.'">Delete</button>';

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

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'city_area' => 'required',
            'city_area_ab' => 'required',
            'city_area_he' => 'required',
            'area_code' => 'required',
            'locations' => 'required',
           
        ]);

        if($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }


        $add_new_loc = array(
            "city_area" => $request->get("city_area"),
            "city_area_ab" => $request->get("city_area_ab"),
            "city_area_he" => $request->get("city_area_he"),
            "area_code" => $request->get("area_code"),
            "latitude" => $request->get("latitude"),
            "longitude" => $request->get("longitude"),
        );

        $location_id = $request->id;

        $location = Location::updateOrCreate(['id' => $location_id],$add_new_loc);


        if ( empty($location_id) )
        {
            $msg = 'Location Added Successfully.';
        } else {
            $msg = 'Location Update Successfully';
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
        $location = Location::where('id',$id)->first();
        return Response::json($location);
    }

    public function destroy(Request $request) 
    {
        $id = $request->get("id");
        $find_record = Location::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name . " deleted successfully";
        }

        return $response;
    }
}