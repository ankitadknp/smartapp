<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', "LoginController@index");
Route::get("login", "LoginController@index")->name("login");
Route::post("login", "LoginController@login")->name("login");

Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@resetPassword')->name('password.update');
Route::get('/password/success', 'ResetPasswordController@showResetSuccessForm')->name('password.success');

Route::group(['middleware' => ['auth','admin']], function () {
    
    Route::get("logout","DashboardController@logout")->name("logout");
    Route::get("dashboard","DashboardController@index")->name("dashboard");

    Route::get("edit_profile/{id}", "DashboardController@edit_profile")->name("edit_profile");
    Route::post("update_profile/{id}", "DashboardController@update_profile")->name("update_profile");
    Route::get("change_password/{id}", "DashboardController@change_password")->name("change_password");
    Route::post("update_password/{id}", "DashboardController@update_password")->name("update_password");

    Route::resource("blog", "BlogController");
    Route::prefix('blog')->group(function () {
        Route::post("list-data", "BlogController@load_data_in_table")->name("blog.load_data_in_table");
        Route::post("change_status", "BlogController@change_status")->name("blog.change_status");
        Route::post("delete", "BlogController@destroy")->name("blog.delete");
        Route::post("show", "BlogController@show")->name("blog.show");
        Route::post("comment", "BlogController@comment")->name("blog.comment");
        Route::post("like", "BlogController@like")->name("blog.like");
    });

    //Categories Module Routing
    Route::resource("categories", "CategoriesController");
    Route::prefix('categories')->group(function () {
        Route::post("delete", "CategoriesController@destroy")->name("categories.delete");
        Route::post("list-data", "CategoriesController@load_data_in_table")->name("categories.load_data_in_table");
        Route::post("change_status", "CategoriesController@change_status")->name("categories.change_status");
    });

    //Public Feed Module Routing
    Route::resource("public_feed", "PublicFeedController");
    Route::prefix('public_feed')->group(function () {
        Route::post("delete", "PublicFeedController@destroy")->name("public_feed.delete");
        Route::post("list-data", "PublicFeedController@load_data_in_table")->name("public_feed.load_data_in_table");
        Route::post("change_status", "PublicFeedController@change_status")->name("public_feed.change_status");
        Route::post("show", "PublicFeedController@show")->name("public_feed.show");
        Route::post("comment", "PublicFeedController@comment")->name("public_feed.comment");
        Route::post("like", "PublicFeedController@like")->name("public_feed.like");
        Route::post("image_delete", "PublicFeedController@image_delete")->name("public_feed.image_delete");
    });
    Route::post('ck/upload','PublicFeedController@uploadImage')->name('ck.upload');

    //Sub Admin Module Routing
    Route::resource("sub_admin", "SubAdminController");
    Route::prefix('sub_admin')->group(function () {
        Route::post("delete", "SubAdminController@destroy")->name("sub_admin.delete");
        Route::post("list-data", "SubAdminController@load_data_in_table")->name("sub_admin.load_data_in_table");
        Route::post("change_status", "SubAdminController@change_status")->name("sub_admin.change_status");
    });

    //Language Module Routing
    Route::resource("language", "LanguageController");
    Route::prefix('language')->group(function () {
        Route::post("delete", "LanguageController@destroy")->name("language.delete");
        Route::post("list-data", "LanguageController@load_data_in_table")->name("language.load_data_in_table");
        Route::post("change_status", "LanguageController@change_status")->name("language.change_status");
    });

    //Coupons QR Module Routing
    Route::resource("coupons-qr", "CouponQrController");
    Route::prefix('coupons-qr')->group(function () {
        Route::post("list-data", "CouponQrController@load_data_in_table")->name("coupons-qr.load_data_in_table");
        Route::post("delete", "CouponQrController@destroy")->name("coupons-qr.delete");
    });

    //Smart Debit Card Module Routing
    Route::resource("smart-debit-card", "SmartDebitCardController");
    Route::prefix('smart-debit-card')->group(function () {
        Route::post("list-data", "SmartDebitCardController@load_data_in_table")->name("smart-debit-card.load_data_in_table");
        Route::post("delete", "SmartDebitCardController@destroy")->name("smart-debit-card.delete");
    });

    //Merchant Module Routing
    Route::resource("merchant", "MerchantController");
    Route::prefix('merchant')->group(function () {
        Route::post("delete", "MerchantController@destroy")->name("merchant.delete");
        Route::post("list-data", "MerchantController@load_data_in_table")->name("merchant.load_data_in_table");
        Route::post("change_status", "MerchantController@change_status")->name("merchant.change_status");
    });

    //Client Module Routing
    Route::resource("client", "ClientController");
    Route::prefix('client')->group(function () {
        Route::post("delete", "ClientController@destroy")->name("client.delete");
        Route::post("list-data", "ClientController@load_data_in_table")->name("client.load_data_in_table");
        Route::post("change_status", "ClientController@change_status")->name("client.change_status");
    });

    //CMSPages Module Routing
    Route::resource("cms_pages", "CMSPagesController");
    Route::prefix('cms_pages')->group(function () {
        Route::post("delete", "CMSPagesController@destroy")->name("cms_pages.delete");
        Route::post("list-data", "CMSPagesController@load_data_in_table")->name("cms_pages.load_data_in_table");
        Route::post("change_status", "CMSPagesController@change_status")->name("cms_pages.change_status");
    });
    

    //Locations Module Routing
    Route::resource("locations", "LocationController");
    Route::prefix('locations')->group(function () {
        Route::post("delete", "LocationController@destroy")->name("locations.delete");
        Route::post("list-data", "LocationController@load_data_in_table")->name("locations.load_data_in_table");
        Route::post("change_status", "LocationController@change_status")->name("locations.change_status");
    });

    //User Role Module Routing
    Route::resource("user-roles", "UserRolesController");
    Route::prefix('user-roles')->group(function () {
        Route::post("delete", "UserRolesController@destroy")->name("user-roles.delete");
        Route::post("list-data", "UserRolesController@load_data_in_table")->name("user-roles.load_data_in_table");
        Route::post("change_status", "UserRolesController@change_status")->name("user-roles.change_status");
        Route::post("list-roles", "UserRolesController@all_role_list_for_select")->name("user-roles.list-roles");
    });

});


Route::group(['middleware' => ['merchant'],  'namespace'=>'MerchantApp','prefix'=>'merchantapp','as'=>'merchantapp.'], function () {

    Route::get("dashboard","DashboardController@index")->name("dashboard");
    Route::get("logout","DashboardController@logout")->name("logout");

    //apply coupon
    Route::resource("apply_coupon", "CouponController");
    Route::get('autocomplete_user', 'CouponController@autocomplete_user')->name('autocomplete_user');
    Route::get('autocomplete_coupon', 'CouponController@autocomplete_coupon')->name('autocomplete_coupon');
    
});

Route::get('/run-migrate-seed', function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed');
    echo 'Migration done';
    die;
});