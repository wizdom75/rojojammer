<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  str  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('product')->with(compact('product'));
    }

    /**
     * API search url
     */
    public function search_show($q)
    {
       $result = Product::where('title', 'like', '%'.$q.'%')->with('images')->orderBy('title', 'asc')->paginate(16);
        return response($result, 200);
    }
    
    /**
     * Get the product and show 
     * @param $id
     * @return json object
     */
    public function api_show($id)
    {
       $product = Product::with('images')->find($id);
           return response()->json($product, 200);
    }
    /**
     * search index
     */
    public function search()
    {
        $categories = Category::where('parent_id', 0)->get();
        
        return view('search')->with(compact('categories'));
    }

}
