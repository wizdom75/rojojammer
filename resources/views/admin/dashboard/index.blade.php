@extends('layouts.admin')
@section('content')
    
    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Dashboard</span>
        </div>
    </div>
        <div class="dashboard admin_shared">
        <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-4" data-equalizer data-equalizer-on="medium" style="padding-left: 1rem;">
            
            <div class="small-12 medium-6 large-3 column summary" data-equalizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="row">
                            <div class="small-3 column">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="small-9 column">
                                <p>Total messages</p><h4>{{$message_nos}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="/admin/messages">View Messages</a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="small-12 medium-6 large-3 column summary" data-equalizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="row">
                            <div class="small-3 column">
                                <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
                            </div>
                            <div class="small-9 column">
                                <p>Stock</p><h4>{{ $product_nos }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="/admin/products">View products</a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="small-12 medium-6 large-3 column summary" data-equalizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="row">
                            <div class="small-3 column">
                                    <i class="fa fa-question"></i>
                            </div>
                            <div class="small-9 column">
                                <p>Quotations</p><h4>{{ $quote_nos }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="/admin/quotes">Quotation Requets</a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="small-12 medium-6 large-3 column summary" data-equalizer-watch>
                <div class="card">
                    <div class="card-section">
                        <div class="row">
                            <div class="small-3 column">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                            <div class="small-9 column">
                            <p>Registerd Users</p><h4>{{ $user_nos }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-divider">
                        <div class="row column">
                            <a href="/admin/users">Registered users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection