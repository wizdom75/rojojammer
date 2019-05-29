@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Add a user</span>
        </div>
    </div>
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        <form action="{{ url('/admin/users') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="grid-container">
                <div class="grid-x grid-padding-x">

                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>NAME:
                            <input name="name" type="text" placeholder="e.g. Joe Bloggs">
                        </label>
                    </div>
                    <div class="medium-12 cell">
                        <label>EMAIL:
                            <input name="email" type="text" placeholder="e.g. jbloggs@example.com">
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                            <label>ROLE:
                                    <select name="is_admin">
                                        <option value="">---Please select a role---</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Customer</option>
                                    </select>
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