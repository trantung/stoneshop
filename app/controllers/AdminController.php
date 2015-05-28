<?php

class AdminController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showWelcome()
    {
        return View::make('hello');
    }

    public function getChangePassword()
    {
        return 'change pass';
    }

    public function getLogout()
    {
        return 'logout';
    }

    public function getIndex()
    {
        return View::make('admin.dashboard');
    }

    public function getCategory(){

        return View::make('admin.category');
    }

    public function getCategoryEdit($cat_id){

        return View::make('admin.category_edit')->with(compact('cat_id'));
    }

    public function postCategoryEdit($cat_id){
        dd($cat_id);
    }

    public function getCategoryCreate(){
        return View::make('admin.category_create');
    }

    public function postCategoryDelete($cat_id){
        dd("deleted");
    }

    public function getSubCatList(){
        return View::make("admin.category_sub");
    }

}
