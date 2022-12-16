<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublicFeed;
use App\PublicFeedImage;
use App\PublicFeedReport;
use App\PublicFeedComment;
use App\PublicFeedLike;
use App\PublicFeedCommentLike;
use App\User;
use File,DB;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\API\NotificationController;

class PublicFeedController extends Controller {

    protected $route_name;
    protected $module_singular_name;

    public function __construct() {
        $this->route_name = 'public_feed';
        $this->module_singular_name = 'Public Feed';
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

        $name = !empty($request->get("public_feed_title")) ? $request->get("public_feed_title") : '';
        $status = !empty($request->get("status")) ? $request->get("status") : '';

        $sidx = 'public_feed_id';

        $list_query = PublicFeed::select("*");

        if (!empty($name)) {
            $list_query = $list_query->where('public_feed_title', "LIKE", "%" . $name . "%")->orWhere('public_feed_title_ab', "LIKE", "%" . $name . "%")->orWhere('public_feed_title_he', "LIKE", "%" . $name . "%");
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

                $report_count = PublicFeedReport::where('public_feed_id',$value->public_feed_id)->count();
                $comment_count = PublicFeedComment::where('public_feed_id',$value->public_feed_id)->count();
                $like_count = PublicFeedLike::where('public_feed_id',$value->public_feed_id)->count();

                $all_records[$index]['public_feed_title'] = $value->public_feed_title;
                $checked = '';
                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2"><input type="checkbox" '.$checked.' data-id="'.$value->public_feed_id .'" class="change_status custom-switch-input"><span class="custom-switch-indicator"></span></label>';

                $all_records[$index]['view'] = '<a href="#" data-toggle="modal" data-target="#myModal" data-id="'.$value->public_feed_id  .'" class="btn btn-light show_modal"><i class="fa fa-file" aria-hidden="true"></i> ('.$report_count.')</a>';

                $all_records[$index]['view_comment'] = '<a href="#" data-toggle="modal" data-target="#comment" data-id="'.$value->public_feed_id  .'" class="btn btn-light comment_modal"><i class="far fa-comment"></i> ('.$comment_count.')</a>';

                $all_records[$index]['view_like'] = '<a href="#" data-toggle="modal" data-target="#like" data-id="'.$value->public_feed_id  .'" class="btn btn-light like_modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> ('.$like_count.')</a>';

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

    public function create() {
        return view($this->route_name . ".add");
    }

    public function store(Request $request) 
    {
        $request->validate([
            "public_feed_title" => "required",
            "public_feed_title_ab" => "required",
            "public_feed_title_he" => "required",
            "content_ab" => "required",
            "content_he" => "required",
            "content" => "required",
            "short_content" => "required",
            "short_content_ab" => "required",
            "short_content_he" => "required",
        ]);


        if ($request->hasFile('cover_image')) {
            $request->validate(["cover_image" => "image|mimes:jpeg,png,jpg|max:5098"]);
        }

        $PUBLIC_FEED_IMAGE =  Config::get('constants.PUBLIC_FEED_IMAGE');

        $add_new_feed = array(
            "public_feed_title" => $request->get("public_feed_title"),
            "public_feed_title_he" => $request->get("public_feed_title_he"),
            "public_feed_title_ab" => $request->get("public_feed_title_ab"),
            "short_content" => $request->get("short_content"),
            "short_content_ab" => $request->get("short_content_ab"),
            "short_content_he" => $request->get("short_content_he"),
            "content_ab" => $request->get("content_ab"),
            "content_he" => $request->get("content_he"),
            'content' => $request->get("content"),
            "status" => 1
        );

        $added = PublicFeed::create($add_new_feed);

        if ($added) 
        {
            // send notification
            $user_device = DB::table('user_device')->leftJoin('users', function($join) {
                $join->on('users.id', '=', 'user_device.user_id');
                })
                ->where('users.status',1)
                ->where('users.is_verified_mobile_no',1)
                ->get();
            if ($user_device != '[]') {
                foreach ( $user_device as $key=>$val) {
                    if ( !empty($user_device) ) {
                        $notification_controller = new NotificationController();
                        $msgVal  = $added->public_feed_title." Public Feed has been added";
                        $title = 'The Public Feed has been added';
                        $type = 2;
                        $u_id = $val->user_id;
                        $device_token = $val->device_token;
                        $notification_controller->add_notification($msgVal,$title,$u_id,$type);
                        $notification_controller->send_notification($msgVal,$device_token,$title);
                    }
                }
            }

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
                        $new_obj->image = $PUBLIC_FEED_IMAGE.$added_id.'/'.$feed_image_name;
                        $new_obj->save();
                    }
                }
            }

            return redirect()->route($this->route_name . ".index")->with("success", $this->module_singular_name . " Added Successfully");
        } else {
            return back()->withInput();
        }
    }

    public function edit(PublicFeed $feed,$public_feed_id) 
    {
        $feed = PublicFeed::where('public_feed_id',$public_feed_id)->first();
        $feed_images = PublicFeedImage::select('*')->where('public_feed_id', $public_feed_id)->get();
        return view($this->route_name . ".edit", ['feed' =>$feed,'feed_images'=>$feed_images]);
    }

    public function update(Request $request, PublicFeed $feed,$public_feed_id) 
    {

        $PUBLIC_FEED_IMAGE =  Config::get('constants.PUBLIC_FEED_IMAGE');

        $request->validate([
            "public_feed_title" => "required",
            "public_feed_title_ab" => "required",
            "public_feed_title_he" => "required",
            "short_content" => "required",
            "short_content_ab" => "required",
            "short_content_he" => "required",
        ]);

        $feed = PublicFeed::where('public_feed_id',$public_feed_id)->first();

        if ($request->hasFile('cover_image')) {
            $request->validate(["cover_image" => "image|mimes:jpeg,png,jpg|max:5098"]);
        }


        $feed->public_feed_title = $request->get("public_feed_title");
        $feed->public_feed_title_ab = $request->get("public_feed_title_ab");
        $feed->public_feed_title_he = $request->get("public_feed_title_he");
        $feed->short_content = $request->get("short_content");
        $feed->short_content_ab = $request->get("short_content_ab");
        $feed->short_content_he = $request->get("short_content_he");
        $feed->content =  $request->get("content") ? $request->get("content") : $feed->content;
        $feed->content_ab =  $request->get("content_ab") ? $request->get("content_ab") : $feed->content_ab;
        $feed->content_he =  $request->get("content_he") ? $request->get("content_he") : $feed->content_he;

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
                        $new_obj->image = $PUBLIC_FEED_IMAGE.$added_id.'/'.$gallery_image_name;
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

    public function destroy(Request $request) 
    {
        $id = $request->get("id");
        $find_record = PublicFeed::find($id);
        $feed_image = PublicFeedImage::where('public_feed_id',$id)->get();
        $feed_like = PublicFeedLike::where('public_feed_id',$id)->get();
        $feed_report = PublicFeedReport::where('public_feed_id',$id)->get();
        $feed_comment = PublicFeedComment::where('public_feed_id',$id)->get();
        $feed_comment_like = PublicFeedCommentLike::where('public_feed_id',$id)->get();

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            if ( !empty($feed_image) )
            {
                foreach ($feed_image as $img_val) 
                {
                    $destinationPath = public_path("/uploads/");
                    $new_path = substr($img_val->image, strpos($img_val->image, "public_feed/") );  
                    $image_path = $destinationPath.$new_path;
                    
                    if (File::exists($image_path)) {
                        unlink($image_path);
                    }
                }
                $folder_path =  public_path("/uploads/" . $this->route_name . "/" . $id);
                if (File::exists($folder_path)) {
                    rmdir($folder_path);
                }
          
                PublicFeedImage::where('public_feed_id',$id)->delete();
            }

            if ( !empty($feed_like) ) 
            {
                PublicFeedLike::where('public_feed_id',$id)->delete();
            }
            if ( !empty($feed_report) ) 
            {
                PublicFeedReport::where('public_feed_id',$id)->delete();
            }
            if ( !empty($feed_comment) ) 
            {
                PublicFeedComment::where('public_feed_id',$id)->delete();
            }
            if ( !empty($feed_comment_like) ) 
            {
                PublicFeedCommentLike::where('public_feed_id',$id)->delete();
            }

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
        $report_count = PublicFeedReport::where('public_feed_id',$id)->count();

        $feed_report = [];
        $path = Config::get('constants.USER_ICON');

        if ( $feed != '[]') 
        {
            $all_report = '<div class="card-body" id="top-5-scroll"><ul class="list-unstyled list-unstyled-border">';
            foreach ($feed as $val)
            {
                $user = User::find($val->user_id);
                if ($user['user_status'] == 0 ) {
                    $u_name = $user['first_name'].' '.$user['last_name'];
                } else if ($user['user_status'] == 1 ) {
                    $u_name = $user['business_name'];
                }
                $report = $val->report;
                $date =  date_format($val->created_at,"Y-m-d");
                $report = $val->report;

                $all_report .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-label">'.$report.'</div></div><div class="budget-price"></div></div></div></li></ul></div>';
            }

            $all_report .= '</ul></div>';
            $feed_report = $all_report;

        } else {
            $feed_report = '<div class="card-body"><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Reports Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li>';
        }

        return json_encode(['feed_report'=>$feed_report,'report_count'=>$report_count]);

    }   

    public function comment(Request $request) 
    {
        $id = $request->get("id");
        $feed = PublicFeedComment::where('public_feed_id','=',$id)->get();
        
        $comment_count = PublicFeedComment::where('public_feed_id',$id)->count();

        $feed_comment = [];
        $path = Config::get('constants.USER_ICON');

        if ( $feed != '[]') 
        {
            $all_comment = '<div class="card-body" id="feed-scroll"><ul class="list-unstyled list-unstyled-border">';
            foreach ($feed as $val)
            {
                $user = User::find($val->user_id);
                if ($user['user_status'] == 0 ) {
                    $u_name = $user['first_name'].' '.$user['last_name'];
                } else if ($user['user_status'] == 1 ) {
                    $u_name = $user['business_name'];
                }
                $date =  date_format($val->created_at,"Y-m-d");
                $comment = $val->comment;

                $all_comment .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-label">'.$comment.'</div></div><div class="budget-price"></div></div></div></li>';
            }

            $all_comment .= '</ul></div>';
            $feed_comment = $all_comment;

        } else {
            $feed_comment = '<div class="card-body"><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Comments Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li></ul></div>';
        }

        return json_encode(['feed_comment'=>$feed_comment,'comment_count'=>$comment_count]);

    } 

    public function like(Request $request) 
    {
        $id = $request->get("id");
        $feed = PublicFeedLike::where('public_feed_id','=',$id)->get();
        $like_count = PublicFeedLike::where('public_feed_id',$id)->count();

        $feed_like = [];
        $path = Config::get('constants.USER_ICON');

        if ( $feed != '[]') 
        {
            $all_like = '<div class="card-body" id="like-scroll"><ul class="list-unstyled list-unstyled-border">';
            foreach ($feed as $val)
            {
                $user = User::find($val->user_id);
                if ($user['user_status'] == 0 ) {
                    $u_name = $user['first_name'].' '.$user['last_name'];
                } else if ($user['user_status'] == 1 ) {
                    $u_name = $user['business_name'];
                }
                $date =  date_format($val->created_at,"Y-m-d");
                if ($val->is_like == 0) {
                    $like = '<i class="fa fa-thumbs-down"></i>';
                } else {
                    $like = '<i class="fa fa-thumbs-up"></i>';
                }

                $all_like .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-label">'.$like.'</div></div><div class="budget-price"></div></div></div></li>';
            }

            $all_like .= '</ul></div>';
            $feed_like = $all_like;

        } else {
            $feed_like = '<div class="card-body"><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Likes Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li></ul></div>';
        }

        return json_encode(['feed_like'=>$feed_like,'like_count'=>$like_count]);

    } 

   

    public function image_delete(Request $request) 
    {
        $id = $request->get("id");

        $find_record = PublicFeedImage::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            $destinationPath = public_path("/uploads/");
            $new_path = substr($find_record->image, strpos($find_record->image, "public_feed/") );  
            $image_path = $destinationPath.$new_path;

            if (File::exists($image_path)) {
                unlink($image_path);
            }

            $find_record->delete();

            $response['success'] = true;
            $response['message'] = "image deleted successfully";
        }
        return $response;
    }
   
}
