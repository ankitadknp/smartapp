<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\PublicFeed;
use App\PublicFeedComment;
use App\PublicFeedCommentLike;
use App\PublicFeedLike;
use App\PublicFeedReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;

class PublicFeedController extends Controller
{
    public function public_feed_comment(Request $request)
    {
        $user_id = Auth::user()->id;

        $feed_comment_data = PublicFeedComment::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ( $feed_comment_data == '' || !isset($feed_comment_data)) {

            $feed_comment = PublicFeedComment::create($input);

            $success['public_feed_id '] =  $feed_comment->public_feed_id ;
            $success['user_id'] =  $feed_comment->user_id;
            $success['comment'] =  $feed_comment->comment;

            return response()->json([
                'success' => true,
                'data'    => $success,
                'message' => 'Added Public Feed Comment Successfully',
                'status' => 200
            ]);

        } else {

            $response = [
                'success' => false,
                'message' => 'Already Added Comment',
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }
    }

    public function public_feed_like(Request $request)
    {
        $user_id = Auth::user()->id;

        $feed_like_data = PublicFeedLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($request->is_like == 1) {
            $msg = 'Public Feed Like Succesfully';
        } else {
            $msg = 'Public Feed Unlike Succesfully';
        }

        if ( $feed_like_data == '' || !isset($feed_like_data)) {

            $feed_like = PublicFeedLike::create($input);

            $success['public_feed_id'] = $feed_like->public_feed_id ;
            $success['user_id'] =  $feed_like->user_id;
            $success['is_like'] =  $feed_like->is_like;

        } else {

            $feed_like = PublicFeedLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->update(['is_like'=>$request->is_like]);

            $success['public_feed_id'] = $request->public_feed_id ;
            $success['user_id'] =  $user_id;
            $success['is_like'] =  $request->is_like;

        }

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

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($request->is_like == 1) {
            $msg = 'Public Feed Comment Like Succesfully';
        } else {
            $msg = 'Public Feed Comment Unlike Succesfully';
        }

        if ( $feed_comment_like_data == '' || !isset($feed_comment_like_data)) {

            $feed_comment_like = PublicFeedCommentLike::create($input);

            $success['public_feed_id'] = $feed_comment_like->public_feed_id ;
            $success['user_id'] =  $feed_comment_like->user_id;
            $success['public_feed_comment_id'] =  $feed_comment_like->public_feed_comment_id;
            $success['is_like'] =  $feed_comment_like->is_like;

        } else {

            $feed_comment_like = PublicFeedCommentLike::where('user_id',$user_id)->where('public_feed_id',$request->public_feed_id)->where('public_feed_comment_id',$request->public_feed_comment_id)->update(['is_like'=>$request->is_like]);

            $success['public_feed_id'] = $request->public_feed_id ;
            $success['user_id'] =  $user_id;
            $success['public_feed_comment_id'] =  $request->public_feed_comment_id;
            $success['is_like'] =  $request->is_like;

        }

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

        if ($search == '') 
        {
            $feed = PublicFeed::with('images')
                ->select('public_feed.*',DB::raw('IFNULL( public_feed_like.is_like, 0) as is_like'))
                ->leftJoin('public_feed_like', function($join) use($user_id){
                        $join->on('public_feed_like.public_feed_id', '=', 'public_feed.public_feed_id')
                        ->where('public_feed_like.user_id',$user_id);
                    })
                ->where('public_feed.status','=',1)
                ->get();

        } else {

            $feed = PublicFeed::with('images')
                ->select('public_feed.*',DB::raw('IFNULL( public_feed_like.is_like, 0) as is_like'))
                ->leftJoin('public_feed_like', function($join) use($user_id) {
                        $join->on('public_feed_like.public_feed_id', '=', 'public_feed.public_feed_id')
                        ->where('public_feed_like.user_id',$user_id);
                    })
                ->where('public_feed.public_feed_title', 'LIKE', '%'.$search.'%')
                ->orWhere('public_feed.public_feed_title_ab', 'LIKE', '%'.$search.'%')
                ->orWhere('public_feed.public_feed_title_he', 'LIKE', '%'.$search.'%')
                ->orWhere('public_feed.content', 'LIKE', '%'.$search.'%')
                ->orWhere('public_feed.content_he', 'LIKE', '%'.$search.'%')
                ->orWhere('public_feed.content_ab', 'LIKE', '%'.$search.'%')
                ->where('public_feed.status','=',1)
                ->get();
        }

        return response()->json([
            'success' => true,
            'data'    => $feed,
            'message' => 'Public Feed List',
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

        $feed_comment = PublicFeedComment::leftJoin('users', function($join) {
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
            WHEN users.user_status = "0" THEN CONCAT(last_name, " ", first_name) 
            WHEN users.status = "1" THEN users.business_name 
            END) AS name'),DB::raw('IFNULL( public_feed_comment_like.is_like, 0) as is_like')
            )
            ->where('public_feed_comment.public_feed_id',$request->public_feed_id)
            ->where('public_feed.status','=',1)
            ->orderby('public_feed_comment.public_feed_id','DESC')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $feed_comment,
            'message' => 'Recent Public Feed Comment List',
            'status' => 200
        ]);

    }

    public function public_feed_report(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'public_feed_id' => 'required',
            'report' => 'required',
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

        return response()->json([
            'success' => true,
            'message' => 'Added Public Feed Report Successfully',
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

        $feed = PublicFeed::with('images')
            ->select('public_feed.*',DB::raw('IFNULL( public_feed_like.is_like, 0) as is_like'))
            ->leftJoin('public_feed_like', function($join) use($user_id){
                    $join->on('public_feed_like.public_feed_id', '=', 'public_feed.public_feed_id')
                    ->where('public_feed_like.user_id',$user_id);
                })
            ->where('public_feed.public_feed_id',$request->public_feed_id)
            ->where('public_feed.status','=',1)
            ->first();

        return response()->json([
            'success' => true,
            'data'    => $feed,
            'message' => 'Public Feed List',
            'status' => 200
        ]);
    
    }
}