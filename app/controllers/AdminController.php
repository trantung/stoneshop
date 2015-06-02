<?php

class AdminController extends BaseController {
    protected $category;
    protected $product;
    protected $shop;
    protected $user;
    protected $image;
    protected $userVisited;
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
    public function __construct(Category $category, Product $product, Shop $shop, User $user, Image $image)
    {
        $this->beforeFilter('admin', array('except'=>array('getLogin','postLogin')));
        $this->beforeFilter('@getUserNameHeader',array('except'=>array('getLogin','postLogin')));
        $this->category     = $category;
        $this->product      = $product;
        $this->shop         = $shop;
        $this->user         = $user;
        $this->image        =$image;

        if (!Session::has('userVisited')){
            Session::put('userVisited', $this->countVisited());
        }
        
    }

    public function getUserNameHeader()
    {
        $username = Auth::user()->username;
        $user = Auth::user();
        View::share('username',$username);
        View::share('user',$user);
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
            return View::make('admin.login')->withErrors('Sai email hoặc password');
        }
    }

    public function getChangePassword()
    {
        return View::make('admin.changepass');
    }

    public function postChangePassword()
    {
        $input = Input::all();
        $password = $input['password'];
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->password = Hash::make($password);
        $user->save();
        return Redirect::route('get.admin.index')->with('message','Thay đổi password thành công');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('get.admin.login');
    }

    public function getIndex()
    {
        $userOnline = $this->countUserOnline();
        $userVisited = Session::get('userVisited');
        $sumVote = $this->product->all()->sum('total_rate');
        return View::make('admin.dashboard')->with('userOnline', $userOnline)->with('userVisited', $userVisited)->with('sumVote', $sumVote);
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
        $products = $this->product->paginate(PAGINATE_BACKEND);
        $categories = $this->category->all();
        $name ='';
        return View::make("admin.product")->with(compact('products','categories','name'));
    }

    public function getProductCreate(){
        $categories = $this->category->all();
        return View::make("admin.product_create")->with(compact('categories'));
    }

    public function postProductCreate(){
        $data = Input::except('_token');
        $destinationPath = public_path().'/img/products';
        $filename = 'nothumnail.jpg';
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
            return Redirect::route('product.index')->with('message', 'Thêm Thành Công!');
        }
        return Redirect::back()->with('message',' Thất Bại !');
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
        $destinationPath = public_path().'/img/products';

        $product->name          = $data['name'];
        $product->description   = $data['description'];
        $product->price         = $data['price'];
        $product->category_id   = $data['category'];
        $filename = 'nothumnail.jpg';
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
        return Redirect::back()->with('message',' Thất Bại !');
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
        $destinationPath = public_path().'/img/shops';
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
        return Redirect::back()->with('message',' Thất Bại !');
    }
    public function getShopEdit($shop_id) {
        $shop = $this->shop->findOrFail($shop_id);
        $users = $this->user->all();
        return View::make('admin.shop_edit')->with('shop', $shop)->with('users', $users);
    }

    public function postShopEdit($shop_id){
        $data = Input::except('_token');
        $shop = $this->shop->findOrFail($shop_id);
        $destinationPath = public_path().'/img/shops';

        $shop->name         = $data['name'];
        $shop->description  = $data['description'];
        $shop->user_id      = $data['user_id'];
        $shop->address      = $data['address'];
        $shop->tel          = $data['tel'];
        $shop->mobile       = $data['mobile'];
        $shop->lat      = $data['lat'];
        $shop->long      = $data['long'];
        $filename = 'nothumnail.jpg';
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
        return Redirect::back()->with('message',' Thất Bại !');
    }

    public function postShopDelete($shop_id){
        $this->shop->destroy($shop_id);
        return Redirect::back()->with('message', 'Xoá Thành Công!');
    }

    public function getImage(){
        $images = $this->image->paginate(10);
        return View::make('admin.image')->with('images', $images);
    }

    public function getImageCreate(){
        return View::make('admin.image_create');
    }

    public function postImageCreate(){
        $data = Input::except('_token');
        $destinationPath = public_path().'/img/headers';
        $filename = 'nothumnail.jpg';
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename        =  $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
            
        }
        $image = Image::create([
                        'type'       => $data['type'],
                        'description'   => $data['description'],
                        'image_url'       => $filename,
                        'status'           => $data['status']
                ]);
        
        if ($image) {
            return Redirect::route('image.index', $image->id)->with('message', 'Thêm Thành Công!');
        }
        return Redirect::back()->with('message',' Thất Bại !');
    }

    public function getImageEdit($image_id){
        $image = $this->image->findOrFail($image_id);
        $option = array('1' => 'Header',
                       '2' => 'Footer',
                       '3' => 'Logo');
        return View::make('admin.image_edit')->with(compact('image','option'));
    }

    public function postiImageEdit($image_id){
        $data = Input::except('_token');
        $image = $this->image->findOrFail($image_id);
        $destinationPath = public_path().'/img/headers';
        $image->type         = $data['type'];
        $image->description  = $data['description'];
        $image->status      = $data['status'];
        $filename = 'nothumnail.jpg';
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $filename        =  $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
            $image->image_url = $filename;
        }
        $image->push();
        if ($image) {
            return Redirect::route('image.index')->with('message', 'Sửa Thành Công!');
        }
        return Redirect::back()->with('message',' Thất Bại !');
    }

    public function postImageDelete($image_id){
        $this->image->destroy($image_id);
        return Redirect::back()->with('message', 'Xoá Thành Công!');
    }


    public function getProductByCategory(){

        $data = Input::all();
        $products = $this->product->where('category_id', $data['category'])->paginate(10);
        $category_sub = $this->category->where('parent_id', $data['category']);
        $categories = $this->category->all();

        return View::make('admin.product_category') ->with('category_sub', $category_sub)
                                                    ->with('products', $products)
                                                    ->with('parent_cate', $data['category'])
                                                    ->with('categories', $categories);

        dd(Input::all());

    }
    public function getEditProfile()
    {
        return View::make('admin.profile');
    }

    public function postEditProfile()
    {
        $input = Input::all();
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->email = $input['email'];
        $user->first_name = $input['firstname'];
        $user->last_name = $input['lastname'];
        $user->username = $input['username'];
        $user->save();
        return Redirect::route('get.admin.index')->with('message', 'Chỉnh sửa thành công');
    }
}
