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
    public function __construct()
    {
        $this->beforeFilter('admin', array('except'=>array('getLogin','postLogin')));
    }

    public function showWelcome()
    {
        return View::make('hello');
    }

    public function getLogin()
    {
        return View::make('admin.login');
    }
    public function postLogin()
    {
        $input = Input::all();
        $login = Auth::attempt(array('email'=>$input['email'],'password'=>$input['password']));
        if($login){
            return Redirect::route('get.admin.index');
        }
        else{
            return View::make('admin.login')->withErrors('sai cmnr');
        }
    }

    public function getChangePassword()
    {
        return 'change pass';
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('get.admin.login');
    }

    public function getIndex()
    {
        return View::make('admin.dashboard');
    }

    public function getCategory(){

        return View::make('admin.category');
    }

}
