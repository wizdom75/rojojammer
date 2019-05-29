<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Banner;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(5);
        return view('admin.banners.index')->with(compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'link' => 'required|max:191',
            'path' => 'max:191',
            'blurb' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480'
        ]);
        
        $imageName = time().'.'.request()->file->getClientOriginalExtension();
        request()->file->move(public_path('storage/img/banners/'), $imageName);
        $path = 'storage/img/banners/'.$imageName;
        $banner =  new Banner;
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->blurb = $request->input('blurb');
        $banner->path = $path;

        $banner->save();

        return back()->with('success', 'New banner added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);

        return view('admin.banners.edit')->with(compact('banner'));
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
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'blurb' => 'required'
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->blurb = $request->input('blurb');


        $banner->save();

        return back()->with('success', 'Banner updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        @unlink( $_SERVER[ 'DOCUMENT_ROOT' ].'/'.$banner->path );
        return back()->with('success', 'Banner deleted');
    }
}
