<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
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
            'title'=>'max:191',
            'from'=>'max:191',
            'email'=>'email',
            'body'=>'max:2000',
            'is_read'=>'max:20'
        ]);

        $message = Message::create($vData);

        return back()->with('message', 'Your message has been sent successfully.');
    }
}
