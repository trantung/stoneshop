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

    public function __construct(Category $category, Product $product, Shop $shop,User $user){

        $this->category     = $category;
        $this->product      = $product;
        $this->shop         = $shop;
        $this->user         = $user;
    }

	public function showIndex(){

		$products = $this->product->paginate(16);
		return View::make('frontend.index')->with('products', $products);
	}

	public function showDetail($product_id){
		$product = $this->product->findOrFail($product_id);
		$productRelate = $this->product->where('category_id', $product->category_id)
										->where('id', '!=', $product_id)	
										->paginate(4);
		return View::make('frontend.detail')->with('product', $product)->with('product_relates', $productRelate);
	}

	public function getBlog(){
		return View::make('frontend.blog');
	}

}
