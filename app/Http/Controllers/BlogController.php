<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogReport;
use App\BlogComment;
use App\BlogLike;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BlogController extends Controller
{
    protected $route_name;
    protected $module_singular_name;
    protected $module_plural_name;

    public function __construct()
    {
        $this->route_name = 'blog';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_avilable_category = \App\Category::where('status', 1)->where('type','=','Blog')->select('category_id', 'category_name')->get();

        return view($this->route_name.'.index')->with(['all_avilable_category' => $all_avilable_category]);
    }

    public function load_data_in_table(Request $request)
    {
        $page = !empty($request->get('start')) ? $request->get('start') : 0;
        $rows = !empty($request->get('length')) ? $request->get('length') : 10;
        $draw = !empty($request->get('draw')) ? $request->get('draw') : 1;

        $sidx = !empty($request->get('order')[0]['column']) ? $request->get('order')[0]['column'] : 0;
        $sord = !empty($request->get('order')[0]['dir']) ? $request->get('order')[0]['dir'] : 'DESC';

        $category_id = !empty($request->get('category_id')) ? $request->get('category_id') : '';
        $blog_title = !empty($request->get('blog_title')) ? $request->get('blog_title') : '';
        $blog_content = !empty($request->get('blog_content')) ? $request->get('blog_content') : '';
        $status = !empty($request->get('status')) ? $request->get('status') : '';

        $sidx = 'blog_id';

        $list_query = Blog::leftJoin('category', function ($join) {
            $join->on('blog.category_id', '=', 'category.category_id');
        })
        ->select('blog.*', 'category.category_name');

        if (!empty($blog_title)) {
            $list_query = $list_query->where('blog_title', 'LIKE', '%'.$blog_title.'%')->orWhere('blog_content_ab', 'LIKE', '%'.$blog_title.'%')->orWhere('blog_content_he', 'LIKE', '%'.$blog_title.'%');
        }

        if (!empty($status)) {
            $list_query = $list_query->where('blog.status', '=', $status);
        }

        $total_rows = $list_query->count();
        $all_records = [];

        if ($total_rows > 0) {
            $list_of_all_data = $list_query->skip($page)
                    ->orderBy($sidx, $sord)
                    ->take($rows)
                    ->get();
            $index = 0;

            foreach ($list_of_all_data as $value) {
                $all_records[$index]['category_id'] = $value->category_name;
                $all_records[$index]['blog_title'] = $value->blog_title;
                $checked = '';

                $report_count = BlogReport::where('blog_id',$value->blog_id)->count();
                $comment_count = BlogComment::where('blog_id',$value->blog_id)->count();
                $like_count = BlogLike::where('blog_id',$value->blog_id)->count();

                if ($value->status == 1) {
                    $checked = 'checked="checked"';
                }

                $all_records[$index]['status'] = '<label class="custom-switch mt-2">
                                                                <input type="checkbox" '.$checked.' data-id="'.$value->blog_id.'" class="change_status custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                              </label>';

                $all_records[$index]['view'] = '<a href="#" data-toggle="modal" data-target="#myModal" data-id="'.$value->blog_id.'" class="btn btn-light show_modal"><i class="fa fa-file" aria-hidden="true"></i> ('.$report_count.')</a>';

                $all_records[$index]['view_comment'] = '<a href="#" data-toggle="modal" data-target="#comment" data-id="'.$value->blog_id.'" class="btn btn-light comment_modal"><i class="far fa-comment"></i> ('.$comment_count.')</a>';

                $all_records[$index]['view_like'] = '<a href="#" data-toggle="modal" data-target="#like" data-id="'.$value->blog_id.'" class="btn btn-light like_modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> ('.$like_count.')</a>';

                $all_records[$index]['edit'] = '<a href="'.route($this->route_name.'.edit', $value->blog_id).'" class="btn btn-light">Edit</a>';

                $all_records[$index]['delete'] = '<button type="button" class="btn btn-danger delete_data_button" data-id="'.$value->blog_id.'">Delete</button>';

                ++$index;
            }
        }
        $response = [];
        $response['draw'] = (int) $draw;
        $response['recordsTotal'] = (int) $total_rows;
        $response['recordsFiltered'] = (int) $total_rows;
        $response['data'] = $all_records;

        return $response;
    }

    public function create()
    {
        $all_avilable_category = \App\Category::where('status', 1)->where('type','=','Blog')->select('category_id', 'category_name')->get();

        return view($this->route_name.'.add')->with(['all_avilable_category' => $all_avilable_category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_title_ab' => 'required',
            'blog_title_he' => 'required',
            'category' => 'required',
            'blog_content' => 'required',
            'blog_content_ab' => 'required',
            'blog_content_he' => 'required',
        ]);

        $add_new_blog = [
            'blog_title' => $request->get('blog_title'),
            'blog_title_ab' => $request->get('blog_title_ab'),
            'blog_title_he' => $request->get('blog_title_he'),
            'category_id' => $request->get('category'),
            'blog_content' => $request->get('blog_content'),
            'blog_content_ab' => $request->get('blog_content_ab'),
            'blog_content_he' => $request->get('blog_content_he'),
            'status' => 1,
        ];

        $added_blog = Blog::create($add_new_blog);

        if ($added_blog) {
            $blog_id = $added_blog->blog_id;

            return redirect()->route($this->route_name.'.index')->with('success', $this->module_singular_name.' Added Successfully');
        } else {
            return back()->withInput();
        }
    }

    public function change_status(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');

        $find_record = Blog::find($id);

        $response = ['success' => false, 'message' => 'Problem while change status'];

        if ($find_record) {
            $find_record->status = $status;
            $find_record->save();

            if ($status == 1) {
                $message = 'Blog has been unblocked';
            } else {
                $message = 'Blog has been blocked';
            }

            $response['success'] = true;
            $response['message'] = $message;
        }

        return $response;
    }

    public function edit(Blog $blog)
    {
        $all_avilable_category = \App\Category::where('status', 1)->where('type','=','Blog')
        ->select('category_id', 'category_name')
        ->get();

        return view($this->route_name.'.edit')->with(
            ['all_avilable_category' => $all_avilable_category,
                'blog' => $blog, ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_title_ab' => 'required',
            'blog_title_he' => 'required',
            'category' => 'required',
           
        ]);
        $blog->category_id = $request->get('category');
        $blog->blog_title = $request->get('blog_title');
        $blog->blog_title_ab = $request->get('blog_title_ab');
        $blog->blog_title_he = $request->get('blog_title_he');
        $blog->blog_content = $request->get('blog_content') ? $request->get('blog_content') : $blog->blog_content;
        $blog->blog_content_ab = $request->get('blog_content_ab') ? $request->get('blog_content_ab') : $blog->blog_content_ab;
        $blog->blog_content_he = $request->get('blog_content_he') ? $request->get('blog_content_he') : $blog->blog_content_he;

        $added_blog = $blog->update();

        if ($added_blog) {
            $blog_id = $blog->blog_id;

            return redirect()->route($this->route_name.'.index')->with('success', $this->module_singular_name.' Update Successfully');
        } else {
            return back()->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');

        $find_record = Blog::find($id);

        $response = ['success' => false, 'message' => 'Problem while deleting this record'];

        if ($find_record) {
            $find_record->delete();

            $response['success'] = true;
            $response['message'] = $this->module_singular_name.' deleted successfully';
        }

        return $response;
    }

    public function show(Request $request)
    {
        $id = $request->get('id');
        $blog = BlogReport::where('blog_id', '=', $id)->get();
        $report_count = BlogReport::where('blog_id',$id)->count();

        $blog_report = [];
        $path = Config::get('constants.USER_ICON');

        if ($blog != '[]') {
            $all_report = '<div class="card-body" id="top-5-scroll"><ul class="list-unstyled list-unstyled-border">';

            foreach ($blog as $val) {
                $user = User::find($val->user_id);
                $u_name = $user['first_name'].' '.$user['last_name'];
                $report = $val->report;
                $date = date_format($val->created_at, 'Y-m-d');

                $all_report .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-label">'.$report.'</div></div><div class="budget-price"></div></div></div></li>';
            }
            $all_report .= '</ul></div>';
            $blog_report = $all_report;
        } else {
            $blog_report = '<div class="card-body" ><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Reports Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li></ul></div>';
        }

        return json_encode(['blog_report'=>$blog_report,'report_count'=>$report_count]);
    }

    public function comment(Request $request)
    {
        $id = $request->get('id');
        $blog = BlogComment::where('blog_id', '=', $id)->get();
        $comment_count = BlogComment::where('blog_id',$id)->count();

        $blog_comment = [];
        $path = Config::get('constants.USER_ICON');

        if ($blog != '[]') {
            $all_comment = '<div class="card-body" id="comment_scroll"><ul class="list-unstyled list-unstyled-border">';

            foreach ($blog as $val) {
                $user = User::find($val->user_id);
                $u_name = $user['first_name'].' '.$user['last_name'];
                $comment = $val->comment;
                $date = date_format($val->created_at, 'Y-m-d');

                $all_comment .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-label">'.$comment.'</div></div><div class="budget-price"></div></div></div></li>';
            }
            $all_comment .= '</ul></div>';
            $blog_comment = $all_comment;
        } else {
            $blog_comment = '<div class="card-body" ><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Comments Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li></ul></div>';
        }

        return json_encode(['blog_comment'=>$blog_comment,'comment_count'=>$comment_count]);
    }

    public function like(Request $request)
    {
        $id = $request->get('id');
        $blog = BlogLike::where('blog_id', '=', $id)->get();
        $like_count = BlogLike::where('blog_id',$id)->count();


        $blog_like = [];
        $path = Config::get('constants.USER_ICON');

        if ($blog != '[]') {
            $all_like = '<div class="card-body" id="like_scroll"><ul class="list-unstyled list-unstyled-border">';

            foreach ($blog as $val) {
                $user = User::find($val->user_id);
                $u_name = $user['first_name'].' '.$user['last_name'];
                $date = date_format($val->created_at, 'Y-m-d');
                if ($val->is_like == 0) {
                    $like = '<i class="fa fa-thumbs-down"></i>';
                } else {
                    $like = '<i class="fa fa-thumbs-up"></i>';
                }

                $all_like .= '<li class="media"><img class="mr-3 rounded" width="55" src="'.$path.'/assets/img/avatar/avatar-1.png"><div class="media-body"><div class="float-right"><div class="font-weight-600 text-muted text-small">'.$date.'</div></div><div class="media-title">'.$u_name.'</div><div class="mt-1"><div class="budget-price"><div class="budget-price-label">'.$like.'</div></div><div class="budget-price"></div></div></div></li>';
            }
            $all_like .= '</ul></div>';
            $blog_like = $all_like;
        } else {
            $blog_like = '<div class="card-body" ><ul class="list-unstyled list-unstyled-border"><li class="media"><img class="mr-3 rounded" width="25" src="'.$path.'/assets/img/download (5).jpg"><div class="media-body"><div class="media-title">No Likes Found</div><div class="mt-1"></div><div class="budget-price"></div></div></div></li></ul></div>';
        }

        return json_encode(['blog_like'=>$blog_like,'like_count'=>$like_count]);
    }
}
