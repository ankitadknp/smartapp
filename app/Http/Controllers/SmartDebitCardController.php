<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\SmartCards;
=======
use App\CouponQRcode;
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
use Hash,Redirect,Response,DB,Validator;
use Illuminate\Validation\Rule;
use File;

class SmartDebitCardController extends Controller {
    
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("smart_debit_card.index");
    }

    public function load_data_in_table(Request $request) {

        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'DESC';

<<<<<<< HEAD
        $name = !empty($request->get("name")) ? $request->get("name") : '';
        $email = !empty($request->get("email")) ? $request->get("email") : '';

        $sidx = 'smart_cards.id';

        $list_query = SmartCards::select('smart_cards.id', 'smart_cards.status', 'users.first_name', 'users.last_name', 'users.email', 'users.phone_number')
                      ->leftjoin('users', 'users.id', 'smart_cards.user_id')
                      ->orderBy($sidx, $sord)
                      ->take($rows);

        if (!empty($name) ) {
            $list_query = $list_query->where("users.first_name", "LIKE", "%" . $name . "%");
            $list_query = $list_query->orWhere("users.last_name", "LIKE", "%" . $name . "%");
        }
        if (!empty($email)) {
            $list_query = $list_query->where("users.email", "LIKE", "%" . $email . "%");
=======
        $coupon_code = !empty($request->get("coupon_code")) ? $request->get("coupon_code") : '';
        $coupon_title = !empty($request->get("coupon_title")) ? $request->get("coupon_title") : '';

        $sidx = 'coupon_qrcode.id';

        $list_query = CouponQRcode::select('coupon_qrcode.id', 'coupon_qrcode.qrcode_url', 'coupon_qrcode.qrcode_file', 'coupon.coupon_code', 'coupon.coupon_title')
                      ->leftjoin('coupon', 'coupon.coupon_id', 'coupon_qrcode.coupon_id')
                      ->orderBy($sidx, $sord)
                      ->take($rows);

        if (!empty($coupon_code) ) {
            $list_query = $list_query->where("coupon.coupon_code", "LIKE", "%" . $coupon_code . "%");
        }
        if (!empty($coupon_title)) {
            $list_query = $list_query->where("coupon.coupon_title", "LIKE", "%" . $coupon_title . "%");
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
        }

        $list_query = $list_query->get();

        $total_rows = $list_query->count();
        $all_records = array();

        if ($total_rows > 0) 
        {
<<<<<<< HEAD
            $index = 0;
            foreach ($list_query as $value) {
                $all_records[$index]['name'] = $value->first_name.' '.$value->last_name;
                $all_records[$index]['email'] = $value->email;
                $all_records[$index]['phone'] = $value->phone_number;
                $all_records[$index]['status'] = $value->status;
                $all_records[$index]['edit'] = '<button type="button" class="btn btn-light edit_data_button" data-id="'. $value->id.'">Edit</button>';
=======
            // $list_of_all_data = $list_query->skip($page)
            //         ->orderBy($sidx, $sord)
            //         ->take($rows)
            //         ->get();
            $index = 0;

            foreach ($list_query as $value) {
                $all_records[$index]['qrcode_url'] = $value->qrcode_url;
                $all_records[$index]['qrcode_file'] = $value->qrcode_file ? '<img src="'.$value->qrcode_file.'" width="50px" />' : 'No Image Found';
                $all_records[$index]['coupon_code'] = $value->coupon_code;
                $all_records[$index]['coupon_title'] = $value->coupon_title;
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $id = $request->get("id");
<<<<<<< HEAD
        $find_record = SmartCards::find($id);
        if ($find_record) {
=======
        $find_record = CouponQRcode::find($id);

        if ($find_record) {
            $destinationPath = public_path("/");
            $new_path = substr($find_record->qrcode_file, strpos($find_record->qrcode_file, "qrcodes/") );  
            $image_path = $destinationPath.$new_path;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
            $find_record->delete();
            $response['success'] = true;
            $response['message'] = "QR Code deleted successfully";
        } else {
            $response = array("success" => false, "message" => "Problem while deleting this record");
        }

        return $response;
    }
<<<<<<< HEAD

    public function edit($id) 
    {
        $smart = SmartCards::where('id',$id)->first();
        return Response::json($smart);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }
        $id  = $request->id ;
        SmartCards::where('id',$id)->update(['status'=>$request->get('status')]);

        return response()->json(
            [
                'success' => true,
                'message' =>'Status update successfully'
            ]
        );
    }
=======
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
}
