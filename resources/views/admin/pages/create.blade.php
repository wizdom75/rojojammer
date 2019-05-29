@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Add a page</span>
        </div>
    </div>
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        <form action="{{ url('/admin/pages') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>TITLE:
                            <input name="title" type="text" placeholder="Page title">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>SLUG:
                            <input name="slug" type="text" placeholder="page-slug">
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <label>BODY:
                            <textarea name="body" id="textarea" placeholder="Page body and write up...."></textarea>
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