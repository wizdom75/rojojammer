<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;

class QuoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vData = $request->validate([
            'product_id' => 'required|max:191',
            'email' => 'required|max:191',
            'name' => 'required|max:191',
            'message' => 'required|max:2000'
        ]);
        
        $quote =  Quote::create($vData);

        return back()->with('success', 'Quote request successfully sent.');
    }

    
}
