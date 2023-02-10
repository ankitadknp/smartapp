<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\PublicFeedController;
use App\Http\Controllers\API\QrCodeController;
use App\Http\Controllers\API\ShareController;
use App\Http\Controllers\API\SmartCardController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\API\CMSPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LanguageManager;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('forgot_password', [UserController::class, 'forgot_password']);
Route::post('reset_password', [ResetPasswordController::class, 'resetPassword']);
Route::get('coupon_category_list', [CouponController::class, 'coupon_category_list']);
Route::get('location_list', [CouponController::class, 'location_list']);
Route::get('cms_pages_list', [CMSPagesController::class, 'cms_pages_list']);

Route::group(['middleware' => [LanguageManager::class]], function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('verify_phone_number', [UserController::class, 'verify_phone_number']);
        Route::get('resend_otp', [UserController::class, 'resend_otp']);
        Route::post('change_password', [UserController::class, 'change_password']);
        Route::get('get_profile', [UserController::class, 'get_profile']);
        Route::post('update_profile', [UserController::class, 'update_profile']);
        Route::get('delete_account', [UserController::class, 'delete_account']);

        Route::get('language_list', [LanguageController::class, 'language_list']);
        Route::post('language_setting', [LanguageController::class, 'language_setting']);

        Route::post('blog_list', [BlogController::class, 'blog_list']);
        Route::post('blog_list_pagination', [BlogController::class, 'blog_list_pagination']);
        Route::post('blog_comment_list_pagination', [BlogController::class, 'blog_comment_list_pagination']);
        Route::post('blog_comment', [BlogController::class, 'blog_comment']);
        Route::post('blog_like', [BlogController::class, 'blog_like']);
        Route::post('blog_comment_like', [BlogController::class, 'blog_comment_like']);
        Route::post('blog_comment_list', [BlogController::class, 'blog_comment_list']);
        Route::post('blog_report', [BlogController::class, 'blog_report']);
        Route::post('blog_details', [BlogController::class, 'blog_details']);
        Route::post('remove_comment', [BlogController::class, 'remove_comment']);

        Route::post('public_feed_list', [PublicFeedController::class, 'public_feed_list']);
        Route::post('public_feed_list_pagination', [PublicFeedController::class, 'public_feed_list_pagination']);
        Route::post('recent_feed_comment_list_pagination', [PublicFeedController::class, 'recent_feed_comment_list_pagination']);
        Route::post('public_feed_comment', [PublicFeedController::class, 'public_feed_comment']);
        Route::post('public_feed_like', [PublicFeedController::class, 'public_feed_like']);
        Route::post('public_feed_comment_like', [PublicFeedController::class, 'public_feed_comment_like']);
        Route::post('recent_feed_comment_list', [PublicFeedController::class, 'recent_feed_comment_list']);
        Route::post('public_feed_report', [PublicFeedController::class, 'public_feed_report']);
        Route::post('public_feed_details', [PublicFeedController::class, 'public_feed_details']);

        Route::post('add_coupon', [CouponController::class, 'add_coupon']);
        Route::post('coupon_list_pagination', [CouponController::class, 'coupon_list_pagination']);
        Route::post('coupon_list', [CouponController::class, 'coupon_list']);
        Route::post('update_coupon', [CouponController::class, 'update_coupon']);
        Route::post('add_mycoupon', [CouponController::class, 'add_mycoupon']);
        Route::get('client_mycoupon_list', [CouponController::class, 'client_mycoupon_list']);
        Route::post('coupon_statistics', [CouponController::class, 'coupon_statistics']);
        Route::post('delete_coupon', [CouponController::class, 'delete_coupon']);
        Route::post('coupon_details', [CouponController::class, 'coupon_details']);

        Route::post('share', [ShareController::class, 'share']);

        Route::get('get-qr-ode', [QrCodeController::class, 'getQrCode']);

        Route::get('get-categories', [CategoriesController::class, 'getCategories']);

        Route::post('apply-card', [SmartCardController::class, 'applyCard']);
        Route::post('cancelled-card', [SmartCardController::class, 'cancelledCard']);
        Route::get('get-card', [SmartCardController::class, 'getCard']);

        Route::post('add_notification', [NotificationController::class, 'add_notification']);
        Route::get('notification_list', [NotificationController::class, 'notification_list']);
        Route::get('clear_notification', [NotificationController::class, 'clear_notification']);

        Route::get('logout', [UserController::class, 'logout']);
        
    });
});
