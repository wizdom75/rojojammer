<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use App\Product;
use App\Quote;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_nos = User::count();
        $message_nos = Message::count();
        $product_nos = Product::count();
        $quote_nos = Quote::count();
        return view('admin.dashboard.index')->with(compact('user_nos', 'message_nos', 'product_nos', 'quote_nos'));
    }
}
