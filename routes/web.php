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

Route::group(['middleware' => 'auth'], function () {
    
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
    
});