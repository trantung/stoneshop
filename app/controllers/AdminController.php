<?php

class AdminController extends BaseController {
    protected $category;
    protected $product;
    protected $shop;
    protected $user;
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
    public function __construct(Category $category, Product $product, Shop $shop,User $user)
    {
        // $this->beforeFilter('admin', array('except'=>array('getLogin','postLogin')));
        $this->category     = $category;
        $this->product      = $product;
        $this->shop         = $shop;
        $this->user         = $user;
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
        return View::make("admin.product")->with('products',$products);
    }

    public function getProductCreate(){
        $categories = $this->category->all();
        return View::make("admin.product_create")->with(compact('categories'));
    }

    public function postProductCreate(){
        $data = Input::except('_token');
        $destinationPath = public_path().'\img\\';
        $filename = 'nothumnail';
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename        =$file->getClientOriginalName();
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
        // $products = Product::find($product_id);
        // $category_detail = $products->category->name;
        // dd($category_detail);
        return View::make('admin.product_edit')->with('product', $product)
                                                ->with('categories', $categories);
    }

    public function postProductEdit($product_id){
        $product = $this->product->findOrFail($product_id);
        $data = Input::except('_token');
        $destinationPath = public_path().'\img\\';

        $product->name          = $data['name'];
        $product->description   = $data['description'];
        $product->price         = $data['price'];
        $product->category_id   = $data['category'];
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename        =  $file->getClientOriginalName();
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

    public function getShop(){
        $shops = $this->shop->all();
        return View::make('admin.shop')->with('shops', $shops);
    }

    public function getShopCreate(){
        $users = $this->user->all();
        return View::make('admin.shop_create')->with('users', $users);
    }

    public function postShopCreate(){
        $data = Input::except('_token');
        $destinationPath = public_path().'\img';
        $filename = 'nothumnail.jpg';
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename        =  $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
            
        }
        $shop = Shop::create([
                        'user_id'       => $data['user_id'],
                        'name'          => $data['name'],
                        'description'   => $data['description'],
                        'address'       => $data['address'],
                        'tel'           => $data['tel'],
                        'mobile'        => $data['mobile'],
                        'lat'           => $data['lat'],
                        'long'          => $data['long'],
                        'image_url'     => $filename]
                );
        
        if ($shop) {
            return Redirect::route('shop.get.edit', $shop->id)->with('message', 'Thêm Thành Công!');
        }
        

        // return Redirect::back()->with('message',' Đã Thêm Thành Công !');
    }
    public function getShopEdit($shop_id) {
        $shop = $this->shop->findOrFail($shop_id);
        $users = $this->user->all();
        return View::make('admin.shop_edit')->with('shop', $shop)->with('users', $users);
    }

    public function postShopEdit($shop_id){
        $data = Input::except('_token');
        $shop = $this->shop->findOrFail($shop_id);
        $destinationPath = public_path().'\img';

        $shop->name         = $data['name'];
        $shop->description  = $data['description'];
        $shop->user_id      = $data['user_id'];
        $shop->address      = $data['address'];
        $shop->tel          = $data['tel'];
        $shop->mobile       = $data['mobile'];
        $shop->address      = $data['lat'];
        $shop->address      = $data['long'];

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename        =  $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
            $shop->image_url = $filename;
            
        }
        
        $shop->push();
        if ($shop) {
            return Redirect::route('shop.get.edit', $shop->id)->with('message', 'Sửa Thành Công!');
        }
    }
    public function postShopDelete($shop_id){
        $this->shop->destroy($shop_id);
        return Redirect::back()->with('message', 'Xoá Thành Công!');
    }
}
