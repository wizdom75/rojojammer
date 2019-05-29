<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories')->with(compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  str  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(Request()->get('sq')){
            return view('category');
        }
        $category = Category::where('slug', $slug)->first();
        return view('category')->with(compact('category'));
    }

}
