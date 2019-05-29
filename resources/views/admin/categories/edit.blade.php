@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Edit category</span>
        </div>
    </div>
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        <form action="{{ url('/admin/categories', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <label>PARENT CATEGORY:
                            <select name="parent_id">
                                <option value="0">--- Root ---</option>
                                @foreach ($categories as $item)
                                    <option {{($item->id == $category->parent_id)?'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>TITLE:
                        <input name="title" type="text" placeholder="Category title" value="{{$category->title}}">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>LINK:
                        <input name="slug" type="text" placeholder="category-slug" value="{{$category->slug}}">
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <label>BLURB:
                            <textarea name="blurb" id="textarea">{{$category->blurb}}</textarea>
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <button type="reset" class="warning button">Reset</button>
                    </div>
                    <div class="medium-6 cell">
                        <button type="submit" class="success button">Update</button>
                    </div>
                </div>
            </div>
        </form>
 
    </div>

@endsection