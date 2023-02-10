<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CMSPages;

class CMSPagesController extends Controller
{
    public function cms_pages_list(Request $request)
    {
        $cmsRes = [];
        $cmsRes['about'] = CMSPages::where('status','=',1)->where('title', 'LIKE', '%about%')->first();
        $cmsRes['term'] = CMSPages::where('status','=',1)->where('title', 'LIKE', '%term%')->first();

        return response()->json([
            'success' => true,
            'data' => $cmsRes,
            'message' =>  trans('message.cms'),
            'status' => 200
        ]);
    }
}