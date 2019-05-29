<?php

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Page;
use App\Image;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', function(){
    return response(Category::all(), 200);
});

Route::get('category/{slug}', function($slug){
    return response(Category::where('slug', $slug)->first(), 200);
});

Route::get('products/{cat_id}', function($cat_id){
    return response(Product::where('category_id', $cat_id)->with('images')->paginate(16), 200);
});

Route::get('product/{id}', 'ProductsController@api_show')->name('get_product');
Route::get('search/{q}', 'ProductsController@search_show')->name('search_show');

Route::get('page/{slug}', function($slug){
    return response(Page::where('slug', $slug)->first(), 200);
});

Route::get('banners', function(){
    return response(Banner::all(), 200);
});

Route::get('videos', function(){
    return response(Video::all(), 200);
});

Route::get('images/{prod_id}', function($prod_id){
    return response(Image::where('product_id', $prod_id)->first(), 200);
});

Route::get('related-products', function(){
    return response(Product::with('images')->take(4)->inRandomOrder()->get(), 200);
});

Route::get('featured-products', function(){
    return response(Product::with('images')->take(8)->inRandomOrder()->get(), 200);
});