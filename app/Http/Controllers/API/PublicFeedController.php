<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,DB;
use App\PublicFeed;
use App\PublicFeedComment;
use App\PublicFeedCommentLike;
use App\PublicFeedLike;
use App\PublicFeedReport;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;

class PublicFeedController extends Controller
{

    public function public_feed_comment(Request $request)
    {
        $user_id = Auth::user()->id;

        $input = $request->all();
        $input['user_id'] = $user_id;

        $FEED_COMMENT_PIC = Config::get('constants.FEED_COMMENT_PIC');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $cover_image_name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/feed_comment_img';
            $image->move($destinationPath, $cover_image_name);
            $pic = $FEED_COMMENT_PIC.$cover_image_name;
            $input['image']  = $pic;
        }

        $feed_comment_res = PublicFeedComment::create($input);

        return response()->json([
            'success' => true,
            'data'    => $feed_comment_res,
            'message' => trans('message.feed_comment'),
            'status' => 200
        ]);
    }

    public function public_feed_like(Request $request)
    {
        $user_id = Auth::user()->id;

        $feed_like_data = PublicFeedLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->first();

        $f_list = PublicFeed::where('public_feed_id',$request->public_feed_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($request->is_like == 1) {
            $msg = trans('message.feed_like');
        } else {
            $msg = trans('message.feed_unlike');
        }

        if ( empty($feed_like_data) || !isset($feed_like_data)) {

            $success = PublicFeedLike::create($input);

        } else {

            $feed_like = PublicFeedLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->update(['is_like'=>$request->is_like]);

            $success['public_feed_id'] = $request->public_feed_id ;
            $success['user_id'] =  $user_id;
            $success['is_like'] =  $request->is_like;

        }

        if ($request->is_like == 1) {
            $like_count = $f_list->feed_like_count + 1 ;
            $unlike_count = ($f_list->feed_unlike_count != 0 ) ? $f_list->feed_unlike_count - 1 :0;
        } else {
            $unlike_count = $f_list->feed_unlike_count + 1 ;
            $like_count = ($f_list->feed_like_count != 0 ) ? $f_list->feed_like_count - 1 :0;
        }

        PublicFeed::where('public_feed_id',$request->public_feed_id)->update(['feed_like_count'=>$like_count,'feed_unlike_count'=>$unlike_count]);

        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => $msg,
            'status' => 200
        ]);
    }

    public function public_feed_comment_like(Request $request)
    {
        $user_id = Auth::user()->id;

        $feed_comment_like_data = PublicFeedCommentLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->where('public_feed_comment_id',$request->public_feed_comment_id)->first();
        $feed_comment_data = PublicFeedComment::where('public_feed_comment_id',$request->public_feed_comment_id)->first();
        $user_data = User::where('id',$user_id)->where('is_verified_mobile_no',1)->where('status',1)->first();
        $feed = PublicFeed::where('public_feed_id',$request->public_feed_id)->first();
        $comment_user_data = User::where('id',$feed_comment_data->user_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($request->is_like == 1) {
            // send notification
            if ( !empty($user_data)) {
                if ($user_data->user_status == 0 ) {
                    $u_name = $user_data->first_name .' '.$user_data->last_name;
                } else if ($user_data->user_status == 1 ) {
                    $u_name = $user_data->business_name;
                }
                $user_device = DB::table('user_device')->where('user_id',$feed_comment_data->user_id)->first();
                if ( !empty($user_device) ) {
                    $notification_controller = new NotificationController();

                    if ($comment_user_data->language_code == 'en') {
                        $msgVal  = $u_name." liked your comment on '$feed->public_feed_title' Public Feed";
                        $title = 'Public Feed comment liked';
                    } else  if ($comment_user_data->language_code == 'he') {
                        $msgVal  = $u_name." סימן 'חכם' על תגובה שלך ב  ".$feed->public_feed_title_he." בפרופיל הציבורי";
                        $title = "חכם' נוסף בפרופיל הציבורי";
                    }else  if ($comment_user_data->language_code == 'ar') {
                        $msgVal  =  "وضعت '$u_name' علامة ' ذكية' على تعليقك على '$feed->public_feed_title_ab' في الملف الشخصي العام";
                        $title = 'تمت إضافة "ذكي" في الملف الشخصي العام';
                    }

                    $u_id = $feed_comment_data->user_id;
                    $type = 2;
                    $coupon_id =0;
                    $feed_id = $request->public_feed_id;
                    $blog_id = 0;
                    $device_token = $user_device->device_token;
                    $notification_controller->add_notification($msgVal,$title,$u_id,$type,$coupon_id,$feed_id,$blog_id);
                    $notification_controller->send_notification($msgVal,$device_token,$title,$feed_id,$type);
                }
            }

            $msg = trans('message.feed_comment_like');
        } else {
            $msg = 'Public Feed Comment Unlike Succesfully';
        }

        if ( empty($feed_comment_like_data) || !isset($feed_comment_like_data)) {
            $success = PublicFeedCommentLike::create($input);

        } else {
            $feed_comment_like = PublicFeedCommentLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->where('public_feed_comment_id',$request->public_feed_comment_id)->update(['is_like'=>$request->is_like]);

            $success['public_feed_id'] = $request->public_feed_id ;
            $success['user_id'] =  $user_id;
            $success['public_feed_comment_id'] =  $request->public_feed_comment_id;
            $success['is_like'] =  $request->is_like;

        }

        if ($request->is_like == 1) {
            $like_count = $feed_comment_data->comment_like_count + 1 ;
            $unlike_count = ( $feed_comment_data->comment_unlike_count != 0 )?$feed_comment_data->comment_unlike_count - 1:0 ;
        } else {
            $unlike_count = $feed_comment_data->comment_unlike_count + 1 ;
            $like_count = ($feed_comment_data->comment_like_count != 0 )?  $feed_comment_data->comment_like_count - 1 :0 ;
        }
        PublicFeedComment::where('public_feed_comment_id',$request->public_feed_comment_id )->update(['comment_like_count'=>$like_count,'comment_unlike_count'=>$unlike_count]);

        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => $msg,
            'status' => 200
        ]);
    }


    public function public_feed_list(Request $request)
    {
        $search = $request->search;

        $user_id = Auth::user()->id;

        $feedobj = PublicFeed::with('images')
                    ->select('public_feed.*',DB::raw('IFNULL( public_feed_like.is_like, 2) as is_like'))
                    ->leftJoin('public_feed_like', function($join) use($user_id) {
                        $join->on('public_feed_like.public_feed_id', '=', 'public_feed.public_feed_id')
                        ->where('public_feed_like.user_id',$user_id);
                    })
                    ->where(function ($query) use ($search) {
                        if(!empty($search)) {
                            $query->where('public_feed.public_feed_title', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.public_feed_title_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.public_feed_title_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.content', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.content_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.content_ab', 'LIKE', '%'.$search.'%');
                        }
                    })
                    ->where('public_feed.status','=',1)
                    ->where('public_feed.is_report','=',0)
                    ->orderby('public_feed.public_feed_id','DESC')
                    ->get();

        return response()->json([
            'success' => true,
            'data'    => $feedobj,
            'message' =>  trans('message.feed'),
            'status' => 200
        ]);
    }

    public function public_feed_list_pagination(Request $request)
    {
        $search = $request->search;
        $start_from = $request->offset;
        $limit = $request->limit;

        $user_id = Auth::user()->id;

        $feedobj = PublicFeed::with('images')
                    ->select('public_feed.*',DB::raw('IFNULL( public_feed_like.is_like, 2) as is_like'))
                    ->leftJoin('public_feed_like', function($join) use($user_id) {
                        $join->on('public_feed_like.public_feed_id', '=', 'public_feed.public_feed_id')
                        ->where('public_feed_like.user_id',$user_id);
                    })
                    ->where(function ($query) use ($search) {
                        if(!empty($search)) {
                            $query->where('public_feed.public_feed_title', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.public_feed_title_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.public_feed_title_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.content', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.content_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('public_feed.content_ab', 'LIKE', '%'.$search.'%');
                        }
                    })
                    ->where('public_feed.status','=',1)
                    ->where('public_feed.is_report','=',0)
                    ->offset($start_from)
                    ->limit($limit)
                    ->orderby('public_feed.public_feed_id','DESC')
                    ->get();

        return response()->json([
            'success' => true,
            'data'    => $feedobj,
            'message' => trans('message.feed'),
            'status' => 200
        ]);
    }

    public function recent_feed_comment_list(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'public_feed_id' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $feed_comment_res = PublicFeedComment::leftJoin('users', function($join) {
                            $join->on('users.id', '=', 'public_feed_comment.user_id');
                        })
                        ->leftJoin('public_feed_comment_like', function($join) use($user_id){
                            $join->on('public_feed_comment.public_feed_comment_id', '=', 'public_feed_comment_like.public_feed_comment_id')
                            ->where('public_feed_comment_like.user_id',$user_id);
                        })
                        ->leftJoin('public_feed', function($join) {
                            $join->on('public_feed.public_feed_id', '=', 'public_feed_comment.public_feed_id');
                        })
                        ->select ('public_feed_comment.*',DB::raw('(CASE 
                        WHEN users.user_status = "0" THEN CONCAT(first_name, " ",last_name ) 
                        WHEN users.status = "1" THEN users.business_name 
                        END) AS name'),DB::raw('IFNULL( public_feed_comment_like.is_like, 2) as is_like'),
                        DB::raw('(CASE 
                            WHEN users.user_status = "0" THEN users.profile_pic
                            WHEN users.status = "1" THEN users.business_logo 
                            END) AS profile_pic')
                        )
                        ->where('public_feed_comment.public_feed_id',$request->public_feed_id)
                        ->where('public_feed.status','=',1)
                        ->where('users.is_block','=',0)
                        ->where('public_feed_comment.is_remove_comment','=',0)
                        ->orderby('public_feed_comment.public_feed_comment_id','DESC')
                        ->get();

        return response()->json([
            'success' => true,
            'data'    => $feed_comment_res,
            'message' => trans('message.feed_recent_comment'),
            'status' => 200
        ]);

    }

    public function recent_feed_comment_list_pagination(Request $request)
    {
        $user_id = Auth::user()->id;
        $start_from = $request->offset;
        $limit = $request->limit;

        $validator = Validator::make($request->all(), [
            'public_feed_id' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $feed_comment_res = PublicFeedComment::leftJoin('users', function($join) {
                            $join->on('users.id', '=', 'public_feed_comment.user_id');
                        })
                        ->leftJoin('public_feed_comment_like', function($join) use($user_id){
                            $join->on('public_feed_comment.public_feed_comment_id', '=', 'public_feed_comment_like.public_feed_comment_id')
                            ->where('public_feed_comment_like.user_id',$user_id);
                        })
                        ->leftJoin('public_feed', function($join) {
                            $join->on('public_feed.public_feed_id', '=', 'public_feed_comment.public_feed_id');
                        })
                        ->select ('public_feed_comment.*',DB::raw('(CASE 
                        WHEN users.user_status = "0" THEN CONCAT(first_name, " ",last_name ) 
                        WHEN users.status = "1" THEN users.business_name 
                        END) AS name'),DB::raw('IFNULL( public_feed_comment_like.is_like, 2) as is_like'),
                        DB::raw('(CASE 
                            WHEN users.user_status = "0" THEN users.profile_pic
                            WHEN users.status = "1" THEN users.business_logo 
                            END) AS profile_pic')
                        )
                        ->where('public_feed_comment.public_feed_id',$request->public_feed_id)
                        ->where('public_feed.status','=',1)
                        ->where('users.is_block','=',0)
                        ->where('public_feed_comment.is_remove_comment','=',0)
                        ->offset($start_from)
                        ->limit($limit)
                        ->orderby('public_feed_comment.public_feed_comment_id','DESC')
                        ->get();

        return response()->json([
            'success' => true,
            'data'    => $feed_comment_res,
            'message' => trans('message.feed_recent_comment'),
            'status' => 200
        ]);

    }

    public function public_feed_report(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'public_feed_id' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['user_id'] = $user_id;

        $feed_comment = PublicFeedReport::create($input);
        PublicFeed::where('public_feed_id',$request->public_feed_id)->update([
            'is_report' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => trans('message.comment_report'),
            'status' => 200
        ]);
    }

    public function public_feed_details(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'public_feed_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $feed_res = PublicFeed::with('images')
                ->select('public_feed.*',DB::raw('IFNULL( public_feed_like.is_like, 2) as is_like'))
                ->leftJoin('public_feed_like', function($join) use($user_id){
                        $join->on('public_feed_like.public_feed_id', '=', 'public_feed.public_feed_id')
                        ->where('public_feed_like.user_id',$user_id);
                    })
                ->where('public_feed.public_feed_id',$request->public_feed_id)
                ->where('public_feed.status','=',1)
                ->first();

        return response()->json([
            'success' => true,
            'data'    => $feed_res,
            'message' =>  trans('message.feed'),
            'status' => 200
        ]);
    
    }
}