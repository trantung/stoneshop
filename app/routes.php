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
Route::get("/", array('as'=>'frontend.index', 'uses'=>'HomeController@showIndex'));
Route::get("/detai/{id}", array('as'=>'frontend.detail', 'uses'=>'HomeController@showDetail'));
Route::get("/blog", array('as'=>'frontend.blog', 'uses'=>'HomeController@getBlog'));
Route::group(array('prefix' => 'admin'), function () {
    /*
    Login: login for admin
     */
    Route::get('/login', array('as'=>'get.admin.login','uses'=>'AdminController@getLogin'));
    Route::post('/login', array('as'=>'post.admin.login','uses'=>'AdminController@postLogin'));

    /*
    Dashboard: index for admin
     */
    Route::get('/', array('as'=>'get.admin.index', 'uses'=>'AdminController@getIndex'));

    /*
    Manage Category
     */
    //overview category
    Route::get('/category', array('as'=>'category.index','uses'=>'AdminController@getCategory'));

    //create new Category
    Route::get('/category/create', array('as'=>'category.get.create','uses'=>'AdminController@getCategoryCreate'));
    Route::post('/category/create', array('as'=>'category.post.create','uses'=>'AdminController@postCategoryCreate'));

    //edit Category
    Route::get('/category/{cat_id}/edit', array('as'=>'category.get.edit','uses'=>'AdminController@getCategoryEdit'));
    Route::post('/category/{cat_id}/edit', array('as'=>'category.post.edit','uses'=>'AdminController@postCategoryEdit'));

    //delete Category
    Route::post('/category/{cat_id}/delete', array('as'=>'category.delete','uses'=>'AdminController@postCategoryDelete'));

    /*
    Manage Sub-Category
     */
    //overview list sub-category follow category_id
    Route::get('/category/listSub', array('as'=>'subcat.get.list','uses'=>'AdminController@getSubCatList'));

    //create new sub-category follow category_id
    Route::get('/category/{cat_id}/add/sub', array('as'=>'subcat.get.add','uses'=>'AdminController@getSubCatAdd'));
    Route::post('/category/{cat_id}/add/sub', array('as'=>'subcat.post.add','uses'=>'AdminController@postSubCatAdd'));

    //edit sub-category follow category_id
    Route::get('/category/{cat_id}/edit/sub/{sub_id}', array('as'=>'subcat.get.edit','uses'=>'AdminController@getSubCatEdit'));
    Route::post('/category/{cat_id}/edit/sub/{sub_id}', array('as'=>'subcat.post.edit','uses'=>'AdminController@postSubCatEdit'));

    //delete sub-category follow category_id
    Route::post('/category/{cat_id}/delete/sub/{sub_id}', array('as'=>'subcat.post.delete','uses'=>'AdminController@postSubCatDelete'));

    /*
    Manage Product
     */
    //overview list product 
    Route::get('/product', array('as'=>'product.index','uses'=>'AdminController@getProduct'));

    //create new product
    Route::get('/product/create', array('as'=>'product.get.create','uses'=>'AdminController@getProductCreate'));
    Route::post('/product/create', array('as'=>'product.post.create','uses'=>'AdminController@postProductCreate'));

    //edit product
    Route::get('/product/{product_id}/edit', array('as'=>'product.get.edit','uses'=>'AdminController@getProductEdit'));
    Route::post('/product/{product_id}/edit', array('as'=>'product.post.edit','uses'=>'AdminController@postProductEdit'));
    //delete product
    Route::post('/product/{product_id}/delete', array('as'=>'product.delete','uses'=>'AdminController@postProductDelete'));
    /*
    Manage Shop
     */
    //overview shop
    Route::get('/shop', array('as'=>'shop.index','uses'=>'AdminController@getShop'));
    Route::get('/shop/create', array('as'=>'shop.get.create','uses'=>'AdminController@getShopCreate'));
    Route::post('/shop/create', array('as'=>'shop.post.create','uses'=>'AdminController@postShopCreate'));

    Route::post('/shop/{shop_id}/delete', array('as'=>'shop.delete','uses'=>'AdminController@postShopDelete'));

    //edit shop(title, description, address, tel, image, lat and long for google map)
    Route::get('/shop/{shop_id}/edit', array('as'=>'shop.get.edit','uses'=>'AdminController@getShopEdit'));
    Route::post('/shop/{shop_id}/edit', array('as'=>'shop.post.edit','uses'=>'AdminController@postShopEdit'));

    /*
    Manage Image Header
     */
    //overview image for header and logo
    Route::get('/image', array('as'=>'image.index','uses'=>'AdminController@getImage'));

    //Create new image
    Route::get('/image/create', array('as'=>'image.get.create','uses'=>'AdminController@getImageCreate'));
    Route::post('/image/create', array('as'=>'image.post.create','uses'=>'AdminController@postImageCreate'));
    //edit image for header and logo
    Route::get('/image/{image_id}/edit', array('as'=>'image.get.edit','uses'=>'AdminController@getImageEdit'));
    Route::post('/image/{image_id}/edit', array('as'=>'image.post.edit','uses'=>'AdminController@postiImageEdit'));

    //delete image header and logo
    Route::post('/image/{image_id}/delete', array('as'=>'image.delete','uses'=>'AdminController@postImageDelete'));

    //
    Route::get('/category/sub', function()
    {
        return View::make('admin.subcategory');
    });
    /*
    User
     */
    //change password
    Route::get('/change_password', array('as'=>'get.changepassword', 'uses'=>'AdminController@getChangePassword'));
    //logout
    Route::get('/logout', array('as'=>'get.logout', 'uses'=>'AdminController@getLogout'));
    
});
