<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::paginate(5);
        return view('admin.settings.index')->with(compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');
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
            'phone' => 'max:191',
            'email' => 'max:191',
            'postcode' => 'max:191',
            'address' => 'max:391'
        ]);

        $setting =  Setting::create($vData);

        return redirect()->route('settings.index')->with('success', 'Settings added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);

        return view('admin.settings.edit')->with(compact('setting'));
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
            'phone' => 'max:191',
            'email' => 'max:191',
            'postcode' => 'max:191',
            'address' => 'max:191'
        ]);

        $setting = Setting::whereId($id)->update($vData);

        return redirect()->route('settings.index')->with('success', 'Setting updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted');
    }
}
