<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\PublicFeedController;
use App\Http\Controllers\API\ShareController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('coupon_category_list', [CouponController::class, 'coupon_category_list']);


Route::middleware('auth:api')->group(function () {
    Route::post('verify_phone_number', [UserController::class, 'verify_phone_number']);
    Route::post('change_password', [UserController::class, 'change_password']);
    Route::get('get_profile', [UserController::class, 'get_profile']);
    Route::post('update_profile', [UserController::class, 'update_profile']);

    Route::get('language_list', [LanguageController::class, 'language_list']);
    Route::post('language_setting', [LanguageController::class, 'language_setting']);

    Route::post('blog_list', [BlogController::class, 'blog_list']);
    Route::post('blog_comment', [BlogController::class, 'blog_comment']);
    Route::post('blog_like', [BlogController::class, 'blog_like']);
    Route::post('blog_comment_like', [BlogController::class, 'blog_comment_like']);
    Route::post('blog_comment_list', [BlogController::class, 'blog_comment_list']);
    Route::post('blog_report', [BlogController::class, 'blog_report']);

    Route::post('public_feed_list', [PublicFeedController::class, 'public_feed_list']);
    Route::post('public_feed_comment', [PublicFeedController::class, 'public_feed_comment']);
    Route::post('public_feed_like', [PublicFeedController::class, 'public_feed_like']);
    Route::post('public_feed_comment_like', [PublicFeedController::class, 'public_feed_comment_like']);
    Route::post('recent_feed_comment_list', [PublicFeedController::class, 'recent_feed_comment_list']);
    Route::post('public_feed_report', [PublicFeedController::class, 'public_feed_report']);

    Route::post('add_coupon', [CouponController::class, 'add_coupon']);
    Route::post('coupon_list', [CouponController::class, 'coupon_list']);
    Route::post('update_coupon', [CouponController::class, 'update_coupon']);
    Route::post('add_mycoupon', [CouponController::class, 'add_mycoupon']);
    Route::get('client_mycoupon_list', [CouponController::class, 'client_mycoupon_list']);
    Route::post('coupon_statistics', [CouponController::class, 'coupon_statistics']);
    Route::post('save_coupon', [CouponController::class, 'save_coupon']);

    Route::post('share', [ShareController::class, 'share']);

    Route::post('add_notification', [NotificationController::class, 'add_notification']);
    Route::get('notification_list', [NotificationController::class, 'notification_list']);
});
