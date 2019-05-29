@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Add A Banner</span>
        </div>
    </div>
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        <form action="{{ url('/admin/banners') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>TITLE:
                        <input name="title" type="text" placeholder="Banner title">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>LINK:
                        <input name="link" type="text" placeholder="Banner link">
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <label for="fileUpload" class="button">Select Banner File</label>
                        <input name="file" type="file" id="fileUpload" class="show-for-sr">
                        <em class="text-danger">For best results use a 1200px by 500px image</em>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <label>BLURB:
                            <input name="blurb" type="text" placeholder="Banner blurb">
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