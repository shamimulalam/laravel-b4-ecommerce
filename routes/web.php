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
    Route::post('user/import','UserController@import')->name('user.import');
    Route::resource('vendor','VendorController');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
    Route::get('product/images/{productId}','ProductController@pictures')->name('product.images');
    Route::get('product/ins_image/{productId}','ProductController@ins_p_img')->name('product.newImage');
    Route::put('product/image/update/{imageId}','ProductController@updateImage')->name('product.image.update');
    Route::delete('product/image/destroy/{imageId}','ProductController@destroyImage')->name('product.image.destroy');
    Route::get('orders','OrderController@index')->name('order.index');
    Route::get('orders/export','OrderController@export')->name('order.export');
    Route::put('orders/declined/{order_id}','OrderController@declined')->name('order.declined');
    Route::put('orders/delivered/{order_id}','OrderController@delivered')->name('order.delivered');

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
