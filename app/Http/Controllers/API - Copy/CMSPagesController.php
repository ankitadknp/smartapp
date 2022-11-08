<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\CMSPages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use Illuminate\Validation\Rule;

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
            'message' => 'CMS Pages List Successfully',
            'status' => 200
        ]);
    }
}