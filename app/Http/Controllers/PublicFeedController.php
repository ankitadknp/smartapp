<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublicFeed;
use App\PublicFeedImage;
use App\PublicFeedReport;
use App\User;
use Illuminate\Support\Facades\Config;

class PublicFeedController extends Controller {

    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct() {
        $this->route_name = 'public_feed';
        $this->module_singular_name = 'public_feed';
        $this->module_plural_name = 'public_feed';
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

        $name = !empty($request->get("public_feed_title")) ? $request->get("public_feed_title") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';

        if ($sidx == 0) {
            $sidx = 'public_feed_title';
        } else {
            $sidx = 'public_feed_id';
        }

        $list_query = PublicFeed::select("*");

        if (!empty($name)) {
            $list_query = $list_query->where('public_feed_title', "LIKE", "%" . $name . "%");
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

                $all_records[$index]['public_feed_title'] = $value->public_feed_title;
                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" '.$checked.' data-id="'.$value->public_feed_id .'" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['view'] = '<a href="#" data-toggle="modal" data-target="#myModal" data-id="'.$value->public_feed_id  .'" class="btn btn-light show_modal">View</a>';

                $all_records[$index]['edit'] = '<a href="' . route($this->route_name . ".edit", $value->public_feed_id  ) . '" class="btn btn-light">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'.$value->public_feed_id  . '">Delete</button>';

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
            "public_feed_title" => "required",
            "content" => "required",
        ]);

        if ($request->hasFile('cover_image')) {
            $request->validate(["cover_image" => "image|mimes:jpeg,png,jpg|max:5098"]);
        }

        $add_new_feed = array(
            "public_feed_title" => $request->get("public_feed_title"),
            'content' => $request->get("content"),
            "status" => 1
        );

        $added = PublicFeed::create($add_new_feed);

        if ($added) 
        {
            $added_id = $added->public_feed_id;

            // Handle multiple file upload
            $images = $request->file('images');

            if (!empty($images)) 
            {
                foreach ($images as $key => $image) 
                {
                    if (!empty($image) && $request->file('images')[$key]->isValid()) 
                    {
                        $feed_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path("/uploads/" . $this->route_name . "/" . $added_id);

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $image->move($destinationPath, $feed_image_name);
                        $new_obj = new PublicFeedImage();
                        $new_obj->public_feed_id = $added_id;
                        $new_obj->image = $feed_image_name;
                        $new_obj->save();
                    }
                }
            }

            return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Added Successfully");
        } else {
            return back()->withInput();
        }
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PublicFeed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicFeed $feed,$public_feed_id) 
    {
        $feed = PublicFeed::where('public_feed_id',$public_feed_id)->first();
        $feed_images = PublicFeedImage::select('*')->where('public_feed_id', $public_feed_id)->get();
        return view($this->route_name . ".edit", ['feed' =>$feed,'feed_images'=>$feed_images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PublicFeed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicFeed $feed,$public_feed_id) 
    {

        $request->validate([
            "public_feed_title" => "required",
        ]);

        $feed = PublicFeed::where('public_feed_id',$public_feed_id)->first();

        if ($request->hasFile('cover_image')) {
            $request->validate(["cover_image" => "image|mimes:jpeg,png,jpg|max:5098"]);
        }


        $feed->public_feed_title = $request->get("public_feed_title");
        $feed->content =  $request->get("content") ? $request->get("content") : $feed->content;

        $added_feed = $feed->update();

        if ($added_feed) 
        {
            $added_id = $feed->public_feed_id;

            // Handle multiple file upload
            $images = $request->file('images');

            if (!empty($images)) 
            {
                foreach ($images as $key => $image) 
                {
                    if (!empty($image) && $request->file('images')[$key]->isValid()) {
                        $gallery_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path("/uploads/" . $this->route_name . "/" . $added_id);
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $image->move($destinationPath, $gallery_image_name);
                        $new_obj = new PublicFeedImage();
                        $new_obj->public_feed_id = $added_id;
                        $new_obj->image = $gallery_image_name;
                        $new_obj->save();
                    }
                }
            }

            return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Update Successfully");
        } else {
            return back()->withInput();
        }

    }

    public function change_status(Request $request) 
    {
        $id = $request->get("id");
        $status = $request->get("status");

        $find_record = PublicFeed::find($id);

        $response = array("success" => false, "message" => "Problem while change status");

        if ($find_record) {

            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = "Public Feed has been unblocked";
            } else {
                $message = "Public Feed has been blocked";
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
        $find_record = PublicFeed::find($id);

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
        $feed = PublicFeedReport::where('public_feed_id','=',$id)->get();

        $feed_report = [];
        $path = Config::get('constants.USER_ICON');

        if ($feed != '[]' )
        {
            $all_report = '<div class="card-body" id="top-5-scroll"><ul class="list-unstyled list-unstyled-border">';
            foreach ($feed as $val)
            {
                $user = User::find($val->user_id);
                $u_name = $user['first_name']. ' '.$user['last_name'];
                $report = $val->report;
                $date =  date_format($val->created_at,"Y-m-d");
                $report = $val->report;

                $all_report .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-square bg-primary" data-width="64%"></div><div class="budget-price-label">'.$report.'</div></div><div class="budget-price"></div></div></div></li></ul></div>';
            }

            $all_report .= '</ul></div>';
            $feed_report = $all_report;

        } else {
            $feed_report = '<div class="card-body"><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Reports Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li></ul></div>';
        }

        return json_encode($feed_report);

    }   

}
