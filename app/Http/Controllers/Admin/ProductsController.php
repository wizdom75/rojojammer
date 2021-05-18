<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $vData = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'specs' => 'max:16300',
            'details' => 'max:16300'
        ]);

        $product = Product::create($vData);

        if($request->hasFile('file')){

            $imageName = time().'.'.request()->file->getClientOriginalExtension();
            request()->file->move(public_path('storage/img/products/'), $imageName);
            $path = 'storage/img/products/'.$imageName;
            
            $oldImage = Image::where('product_id', $product->id)->get();
            foreach($oldImage as $oldImageX){
                $oldImageX->delete();
            }
            

            $image =  new Image;
            $image->product_id = $product->id;
            $image->path = $path;
            $image->save();


        }

        return back()->with('success', 'New product added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit')->with(compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vData = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'specs' => 'max:16300',
            'details' => 'max:16300'
        ]);

        $product = Product::whereId($id)->update($vData);
        if($request->hasFile('file')){

            $cur_image = Image::where('product_id', $id)->first();
            @unlink($_SERVER['DOCUMENT_ROOT'] . '/'.$cur_image->path);


            $imageName = time().'.'.request()->file->getClientOriginalExtension();
            request()->file->move(public_path('storage/img/products/'), $imageName);
            $path = 'storage/img/products/'.$imageName;
    
            $image =  Image::where('product_id', $id)->first();
            $image->path = $path;
            $image->update();


        }

        return back()->with('success', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Product deleted');
    }
}
