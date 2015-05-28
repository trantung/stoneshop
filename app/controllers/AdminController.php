<?php

class AdminController extends BaseController {
    protected $category;
    protected $post;
    protected $snsaccount;
    protected $attachment;
    protected $member;
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
    public function __construct(\Category $category)
    {
        // $this->beforeFilter('admin', array('except'=>array('getLogin','postLogin')));
        $this->category     = $category;
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
        $categorys = $this->category->all();
        return View::make('admin.category')->with('categorys',$categorys);
    }

    public function getCategoryEdit($cat_id){
        $category = $this->category->findOrFail($cat_id);
        return View::make('admin.category_edit')->with('category', $category);
    }

    public function postCategoryEdit($cat_id){
        $data = Input::except("_token");
        $category = $this->category->findOrFail($cat_id);

        $category->name         = $data['name'];
        $category->description  = $data['description'];

        $category->push();

        return Redirect::back()->with('message',' Lưu Thành Công !');

    }

    public function getCategoryCreate(){
        return View::make('admin.category_create');
    }


    public function postCategoryCreate(){
        $data   = Input::except("_token");
        $data["shop_id"] = 1;
        $category = $this->category;
        $category->firstOrCreate($data);
         return Redirect::back()->with('message',' Đã Thêm Thành Công !');
    }

    public function postCategoryDelete($cat_id){
        $this->category->destroy($cat_id);
        return Redirect::back();
    }

    public function getSubCatList(){
        return View::make("admin.category_sub");
    }

    public function getProduct(){
        return View::make("admin.product");
    }

}
