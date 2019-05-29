@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Add settings</span>
        </div>
    </div>
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="grid-container">
                <div class="grid-x grid-padding-x">

                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>PHONE NUMBER:
                            <input name="phone" type="text" placeholder="e.g. +44 (0) 7894 784326">
                        </label>
                    
                        <label>EMAIL:
                            <input name="email" type="text" placeholder="e.g. jbloggs@example.com">
                        </label>
           
                        <label>POST CODE:
                            <input name="postcode" type="text" placeholder="e.g. SE2 5TG">
                        </label>
                    </div>

                    <div class="medium-6 cell">
                        <label>ADDRESS:
                            <textarea name="address" id="textarea" placeholder="3 Example Street, \n London"></textarea>
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <button type="reset" class="warning button">Clear</button>
                    </div>
                    <div class="medium-6 cell">
                        <button type="submit" class="success button">Save</button>
                    </div>
                </div>
            </div>
        </form>
 
    </div>

@endsection