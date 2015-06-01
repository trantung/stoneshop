<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $category;
    protected $product;
    protected $shop;
    protected $user;
    protected $image;

    public function __construct(Category $category, Product $product, Shop $shop,User $user, Image $image){
    	$this->beforeFilter('@getTitleAndCategoryName');
        $this->category     = $category;
        $this->product      = $product;
        $this->shop         = $shop;
        $this->user         = $user;
        $this->image 		=$image;
    }
    public function getTitleAndCategoryName()
    {
    	$title = $this->shop->first()->description;
    	$categories = $this->category->where('parent_id',0)->get();
    	$image_header = $this->image->where('type', 1)->where('status', 1)->first()->image_url;
    	$image_footer = $this->image->where('type', 2)->where('status', 1)->first()->image_url;
    	$image_logo = $this->image->where('type', 3)->where('status', 1)->first()->image_url;
    	View::share('title',$title);
    	View::share('logo',$image_logo);
    	View::share('header',$image_header);
    	View::share('footer',$image_footer);
    	View::share('categories',$categories);
    }

	public function showIndex(){

		$products = $this->product->paginate(16);
		return View::make('frontend.index')->with('products', $products);
	}

	public function showDetail($product_id){
		$product = $this->product->findOrFail($product_id);
		$productRelate = $this->product->where('category_id', $product->category_id)
										->where('id', '!=', $product_id)	
										->take(3)->get();
		return View::make('frontend.detail')->with('product', $product)->with('product_relates', $productRelate);
	}

	public function getBlog(){
		return View::make('frontend.blog');
	}

	public function getCategory($cat_id)
	{
		$sub_cates = $this->category->where('parent_id', $cat_id);
		$products = $this->product->where('category_id',$cat_id)->paginate(16);
		return View::make('frontend.category_detail')->with(compact('products'))->with('sub_cates', $sub_cates);
	}

	public function getAboutUs()
	{
		$shop = $this->shop->first();
		return View::make('frontend.aboutus')->with(compact('shop'));
	}
}
