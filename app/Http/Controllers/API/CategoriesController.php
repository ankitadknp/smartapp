<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCategories(Request $request)
    {
        $couponRes = [];

        $couponRes['coupons'] = Category::where('type', 'Coupon')->get();
        $couponRes['blogs'] = Category::where('type', 'Blog')->get();

        return response()->json([
            'success' => true,
            'data' => $couponRes,
            'message' => trans('message.category'),
            'status' => 200,
        ]);
    }
}
