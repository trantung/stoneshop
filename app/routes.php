<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get("/", function(){
    return View::make("frontend.index");
});
Route::get("/detail", function(){
    return View::make("frontend.detail");
});
Route::group(array('prefix' => 'admin'), function () {

    Route::get('/', function()
    {
        return View::make('admin.dashboard');
    });

    Route::get('/category', function()
    {
        return View::make('admin.category');
    });
    Route::get('/category/sub', function()
    {
    	return View::make('admin.subcategory');
    });


    Route::get('/{id}/change_password', array('as'=>'get.changepassword', 'uses'=>'AdminController@getChangePassword'));

    Route::get('/logout', array('as'=>'get.logout', 'uses'=>'AdminController@getLogout'));

    Route::get('/', array('as'=>'index', 'uses'=>'AdminController@getIndex'));


});
