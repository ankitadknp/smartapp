<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,DB;
use App\Blog;
use App\BlogComment;
use App\BlogLike;
use App\User;
use App\BlogCommentLike;
use App\BlogReport;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog_comment(Request $request)
    {
        $user_id = Auth::user()->id;

        $blog_comment_data = BlogComment::where('user_id',$user_id)->where('blog_id',$request->blog_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ( empty($blog_comment_data) || !isset($blog_comment_data)) {

            $blog_comment_res = BlogComment::create($input);

            return response()->json([
                'success' => true,
                'data'    => $blog_comment_res,
                'message' => 'Added Blog Comment Successfully',
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

    public function blog_like(Request $request)
    {
        $user_id = Auth::user()->id;

        $blog_like_data = BlogLike::where('user_id',$user_id)->where('blog_id',$request->blog_id)->first();

        $b_list = Blog::where('blog_id',$request->blog_id)->first();

        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($request->is_like == 1) {
            $msg = 'Blog Like Succesfully';
        } else {
            $msg = 'Blog Unlike Succesfully';
        }

        if ( empty($blog_like_data) || !isset($blog_like_data)) {

            $success = BlogLike::create($input);

        } else {

            $blog_like = BlogLike::where('user_id',$user_id)->where('blog_id',$request->blog_id)->update(['is_like'=>$request->is_like]);

            $success['blog_id'] = $request->blog_id ;
            $success['user_id'] =  $user_id;
            $success['is_like'] =  $request->is_like;

        }

        if ($request->is_like == 1) {
            $like_count = $b_list->blog_like_count + 1 ;
            $unlike_count = ( $b_list->blog_unlike_count != 0 ) ? $b_list->blog_unlike_count - 1  : 0;
        } else {
            $unlike_count = $b_list->blog_unlike_count + 1 ;
            $like_count = ($b_list->blog_like_count != 0 ) ? $b_list->blog_like_count - 1 : 0 ;
        }

        Blog::where('blog_id',$request->blog_id)->update(['blog_like_count'=>$like_count,'blog_unlike_count'=>$unlike_count]);
        
        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => $msg,
            'status' => 200
        ]);
    }

    public function blog_comment_like(Request $request)
    {
        $user_id = Auth::user()->id;

        $blog_comment_like_data = BlogCommentLike::where('user_id',$user_id)->where('blog_id',$request->blog_id)->where('blog_comment_id',$request->blog_comment_id)->first();

        $blog_comment_data = BlogComment::where('blog_comment_id',$request->blog_comment_id)->first();
        $user_data = User::where('id',$user_id)->where('is_verified_mobile_no',1)->where('status',1)->first();
        $blog = Blog::where('blog_id',$request->blog_id)->first();

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
                $user_device = DB::table('user_device')->where('user_id',$blog_comment_data->user_id)->first();
                if ( !empty($user_device) ) {
                    $notification_controller = new NotificationController();
                    $msgVal  = $u_name." liked your comment on '$blog->blog_title' Blog";
                    $title = 'Like The Blog Comment';
                    $type = 1;
                    $u_id = $blog_comment_data->user_id;
                    $device_token = $user_device->device_token;
                    $notification_controller->add_notification($msgVal,$title,$u_id,$type);
                    $notification_controller->send_notification($msgVal,$device_token,$title);
                }
            }

            $msg = 'Blog Comment Like Succesfully';
        } else {
            $msg = 'Blog Comment Unlike Succesfully';
        }

        if ( empty($blog_comment_like_data) || !isset($blog_comment_like_data)) {
            $success = BlogCommentLike::create($input);

        } else {
         
            $blog_comment_like = BlogCommentLike::where('user_id',$user_id)->where('blog_id',$request->blog_id)->where('blog_comment_id',$request->blog_comment_id)->update(['is_like'=>$request->is_like]);

            $success['blog_id'] = $request->blog_id ;
            $success['user_id'] =  $user_id;
            $success['blog_comment_id'] =  $request->blog_comment_id;
            $success['is_like'] =  $request->is_like;

        }

        if ($request->is_like == 1) {
            $like_count = $blog_comment_data->comment_like_count + 1 ;
            $unlike_count = ($blog_comment_data->comment_unlike_count != 0 ) ? $blog_comment_data->comment_unlike_count - 1 : 0 ;
        } else {
            $unlike_count = $blog_comment_data->comment_unlike_count + 1 ;
            $like_count = ( $blog_comment_data->comment_like_count != 0 ) ?$blog_comment_data->comment_like_count - 1 :0 ;
        }

        BlogComment::where('blog_comment_id',$request->blog_comment_id )->update(['comment_like_count'=>$like_count,'comment_unlike_count'=>$unlike_count]);

        return response()->json([
            'success' => true,
            'data'    => $success,
            'message' => $msg,
            'status' => 200
        ]);
    }

    public function blog_list(Request $request)
    {
        $user_id = Auth::user()->id;
    
        $search = $request->search;
        $category_id = $request->category_id;
    
    
        $blogObj = Blog::select('blog.*','category.category_name','category.category_name_ab','category.category_name_he',DB::raw('IFNULL( blog_like.is_like, 2) as is_like'))
                        ->leftJoin('category', function($join) {
                            $join->on('blog.category_id', '=', 'category.category_id')
                            ->where('category.type','=','Blog');
                        })
                        ->leftJoin('blog_like', function($join) use($user_id){
                            $join->on('blog.blog_id', '=', 'blog_like.blog_id')
                            ->where('blog_like.user_id',$user_id);
                        })
                    ->where('blog.status','=',1)
                    ->where(function ($query) use ($search,$category_id) {
                        if(!empty($search)) {
                            $query->orWhere('blog.blog_title_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('blog.blog_title_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('blog.blog_title_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('blog.blog_content', 'LIKE', '%'.$search.'%')
                            ->orWhere('blog.blog_content_ab', 'LIKE', '%'.$search.'%')
                            ->orWhere('blog.blog_content_he', 'LIKE', '%'.$search.'%')
                            ->orWhere('blog.blog_content', 'LIKE', '%'.$search.'%');
                        }
                        if(!empty($category_id)) {
                            $query->where('blog.category_id', $category_id);
                        }
                    })
                    ->orderby('blog.blog_id','DESC')
                    ->get();
    
        return response()->json([
            'success' => true,
            'data'    => $blogObj,
            'message' => 'Blog List',
            'status' => 200
        ]);
    }

    public function blog_comment_list(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'blog_id' => 'required',
        ]);
    
        if($validator->fails()){

            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400
            ];
    
            return response()->json($response, 400);
        }

        $blog_comment_res = BlogComment::leftJoin('users', function($join) {
                            $join->on('users.id', '=', 'blog_comment.user_id');
                        })
                        ->leftJoin('blog_comment_like', function($join) use($user_id){
                            $join->on('blog_comment.blog_comment_id', '=', 'blog_comment_like.blog_comment_id')
                            ->where('blog_comment_like.user_id',$user_id);
                        })
                        ->leftJoin('blog', function($join) {
                            $join->on('blog.blog_id', '=', 'blog_comment.blog_id');
                        })
                        ->select ('blog_comment.*',DB::raw('(CASE 
                            WHEN users.user_status = "0" THEN CONCAT(first_name, " ",last_name ) 
                            WHEN users.status = "1" THEN users.business_name 
                            END) AS name'),DB::raw('IFNULL( blog_comment_like.is_like, 2) as is_like')
                        )
                        ->where('blog_comment.blog_id',$request->blog_id)
                        ->where('blog.status','=',1)
                        ->orderby('blog_comment.blog_comment_id','DESC')
                        ->get();

        return response()->json([
            'success' => true,
            'data'    => $blog_comment_res,
            'message' => 'Recent Blog Comment List',
            'status' => 200
        ]);

    }


    public function blog_report(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'blog_id' => 'required',
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

        $feed_comment = BlogReport::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Added Blog Report Successfully',
            'status' => 200
        ]);
    }

    public function blog_details(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'blog_id' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()->first(),
                'status' => 400,
            ];

            return response()->json($response, 400);
        }

        $blog_res = Blog::leftJoin('category', function($join) {
                    $join->on('blog.category_id', '=', 'category.category_id')
                    ->where('category.type','=','Blog');
                })
                ->leftJoin('blog_like', function($join) use($user_id){
                    $join->on('blog.blog_id', '=', 'blog_like.blog_id')
                    ->where('blog_like.user_id',$user_id);
                })
                ->select('blog.*','category.category_name','category.category_name_ab','category.category_name_he',DB::raw('IFNULL( blog_like.is_like, 2) as is_like'))
                ->where('blog.status','=',1)
                ->where('blog.blog_id',$request->blog_id)
                ->first();

        return response()->json([
            'success' => true,
            'data'    => $blog_res,
            'message' => 'Blog List',
            'status' => 200
        ]);

    }
}