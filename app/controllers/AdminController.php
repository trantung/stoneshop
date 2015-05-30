<?php

class AdminController extends BaseController {
    protected $category;
    protected $product;
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
    public function __construct(\Category $category, \Product $product)
    {
        // $this->beforeFilter('admin', array('except'=>array('getLogin','postLogin')));
        $this->category     = $category;
        $this->product     = $product;
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
        $parents = Category::getParentCategory();
        return View::make('admin.category_create')->with(compact('parents'));
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
        return Redirect::back()->with('message', 'Xoá Thành Công!');
    }

    public function getSubCatList(){
        return View::make("admin.category_sub");
    }

    public function getProduct(){
        $products = $this->product->paginate(10);
        $categories = $this->category->all();

        return View::make("admin.product")->with('products',$products)
                                          ->with('categories',$categories);
    }

    public function getProductCreate(){
        $categories = $this->category->all();
        return View::make("admin.product_create")->with(compact('categories'));
    }

    public function postProductCreate(){
        $data = Input::except('_token');
        $destinationPath = public_path().'/img/';
        $filename = 'nothumnail';
        if(!is_null($data['image'] )){
            $file = $data['image'];
            $time = date("Y-m-d H:i:s");
            $filename        =  $time . '_' . $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
            
        }
        $product = Product::create([
                        'name'          => $data['name'],
                        'price'         => $data['price'],
                        'description'   => $data['description'],
                        'category_id'   => $data['category'],
                        'image_url'     => $filename]);

        if ($product) {
            return Redirect::route('product.get.edit', $product->id)->with('message', 'Thêm Thành Công!');
        }
    }    

    public function getProductEdit($product_id) {
        $product = $this->product->findOrFail($product_id);
        $categories = $this->category->all();
        return View::make('admin.product_edit')->with('product', $product)
                                                ->with('categories', $categories);
    }

    public function postProductEdit($product_id){
        $product = $this->product->findOrFail($product_id);
        $data = Input::except('_token');
        $destinationPath = public_path().'/img/';

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->category_id = $data['category'];
        if(!is_null($data['image'] )){
            $file = $data['image'];
            $time = date("Y-m-d H:i:s");
            $filename        =  $time . '_' . $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
            $product->image_url = $filename;
            
        }
        $product->push();
        if ($product) {
            return Redirect::route('product.get.edit', $product->id)->with('message', 'Sửa Thành Công!');
        }
    }

    public function postProductDelete($product_id){
        $this->product->destroy($product_id);
        return Redirect::back()->with('message', 'Xoá Thành Công!');
    }
}
