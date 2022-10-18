<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CouponQRcode;
use Hash,Redirect,Response,DB,Validator;
use Illuminate\Validation\Rule;

class CouponQrController extends Controller {
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("coupon_qrcode/index");
    }

    public function load_data_in_table(Request $request) {

        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'DESC';

        $coupon_code = !empty($request->get("coupon_code")) ? $request->get("coupon_code") : '';
        $coupon_title = !empty($request->get("coupon_title")) ? $request->get("coupon_title") : '';

        $sidx = 'id';

        $list_query = CouponQRcode::select('coupon_qrcode.qrcode_url', 'coupon_qrcode.qrcode_file', 'coupon.coupon_code', 'coupon.coupon_title')
                      ->leftjoin('coupon', 'coupon.coupon_id', 'coupon_qrcode.coupon_id')
                      ->get();
   
        if (!empty($coupon_code) ) {
            //$list_query = $list_query->where("coupon.coupon_code", "LIKE", "%" . $coupon_code . "%");
        }
        if (!empty($coupon_title)) {
            //$list_query = $list_query->where("coupon.coupon_title", "LIKE", "%" . $coupon_title . "%");
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

        $validator = Validator::make($request->all(),[
            'language_name' => 'required|max:50',
            'language_code' => 'required',
        ]);

        if($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }


        $add_new_lan = array(
            "language_name" => $request->get("language_name"),
            "language_code" => $request->get("language_code"),
        );

        $language_id = $request->language_id;

        $language = Language::updateOrCreate(['language_id' => $language_id],['language_name' => $request->language_name, 'language_code' => $request->language_code]);


        if ( empty($language_id) )
        {
            $msg = 'Language Added Successfully.';
        } else {
            $msg = 'Language Update Successfully';
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
        $language = Language::where('language_id',$id)->first();
        return Response::json($language);
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
