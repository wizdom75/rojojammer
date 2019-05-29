@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Edit product</span>
        </div>
    </div>
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>PRODUCT CATEGORY:
                            <select name="category_id">
                                <option value="">---Please select a category---</option>
                                @foreach ($categories as $item)
                                    <option {{($item->id == $product->category_id)?'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <br>
                        <label for="fileUpload" class="button secondary">Select Product Image</label>
                        <input name="file" type="file" id="fileUpload" class="show-for-sr">
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>TITLE:
                            <input name="title" type="text" value="{{$product->title}}">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>LINK:
                            <input name="slug" type="text" value="{{$product->slug}}">
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <label>SPECS:
                            <textarea name="specs" id="textarea" placeholder="Specifications">{{$product->specs}}</textarea>
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>DETAILS:
                            <textarea name="details" id="textarea" placeholder="Product details">{{$product->details}}</textarea>
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="medium-6 cell">
                        <button type="reset" class="warning button">Clear</button>
                    </div>
                    <div class="medium-6 cell">
                        <button type="submit" class="success button">Update</button>
                    </div>
                </div>
            </div>
        </form>
 
    </div>

@endsection