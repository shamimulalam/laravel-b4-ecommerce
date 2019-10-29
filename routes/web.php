<?php

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

Route::get('/','HomeController@index');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::get('about','DashboardController@about')->name('admin.about');
    Route::resource('user','UserController');
    Route::resource('vendor','VendorController');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
    Route::resource('category','CategoryController');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
