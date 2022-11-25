<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmartCards;
use Redirect,Response,DB,Validator;

class SmartDebitCardController extends Controller {

    public function __construct() {
        $this->middleware("checkmodulepermission");
    }
    
    public function index() {
        return view("smart_debit_card.index");
    }

    public function load_data_in_table(Request $request) {

        $page = !empty($request->get("start")) ? $request->get("start") : 0;
        $rows = !empty($request->get("length")) ? $request->get("length") : 10;
        $draw = !empty($request->get("draw")) ? $request->get("draw") : 1;

        $sidx = !empty($request->get("order")[0]['column']) ? $request->get("order")[0]['column'] : 0;
        $sord = !empty($request->get("order")[0]['dir']) ? $request->get("order")[0]['dir'] : 'DESC';

        $name = !empty($request->get("name")) ? $request->get("name") : '';
        $email = !empty($request->get("email")) ? $request->get("email") : '';

        $sidx = 'smart_cards.id';

        $list_query = SmartCards::select('smart_cards.id', 'smart_cards.status', 'users.first_name', 'users.last_name', 'users.email', 'users.phone_number','users.user_status','users.business_name')
                      ->leftjoin('users', 'users.id', 'smart_cards.user_id');

        if (!empty($name) ) {
            $list_query = $list_query->where(function ($query) use ($name) { 
                $query->where(DB::raw("CONCAT(first_name,' ',last_name)"), "LIKE", "%" . $name . "%")
                ->orWhere('users.business_name', 'LIKE', '%'.$name.'%');
            });
        }
        if (!empty($email)) {
            $list_query = $list_query->where("users.email", "LIKE", "%" . $email . "%");
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
                if ($value->user_status == '1') {
                    $all_records[$index]['name'] = $value->business_name;
                } else if ($value->user_status == 0)  {
                    $all_records[$index]['name'] = $value->first_name.' '.$value->last_name;
                }
                $all_records[$index]['email'] = $value->email;
                $all_records[$index]['phone'] = $value->phone_number;
                $all_records[$index]['status'] = $value->status;
                $all_records[$index]['edit'] = '<button type="button" class="btn btn-light edit_data_button" data-id="'. $value->id.'">Edit</button>';
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

    public function destroy(Request $request) 
    {
        $id = $request->get("id");
        $find_record = SmartCards::find($id);
        if ($find_record) {
            $find_record->delete();
            $response['success'] = true;
            $response['message'] = "QR Code deleted successfully";
        } else {
            $response = array("success" => false, "message" => "Problem while deleting this record");
        }

        return $response;
    }

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
}
