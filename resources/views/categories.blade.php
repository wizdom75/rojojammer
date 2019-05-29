@extends('layouts.app')
@section('title', 'All categories')
@section('content')
<div class="container-fluid col-lg-11 col-xl-10">
<!-- Breadcrumbs -->
    @include('inc.breadcrumb')
    <h1 class="text-muted">All Categories</h1>
    <div class="row">
        @foreach(App\Category::where('parent_id', 0)->get() as $category)
            <div class="col-md-4 col-sm-6">
                <h3 class="h4"><a class="text-muted" href="/browse/{{$category->slug}}">{{$category->title}}</a></h3>
                @foreach(App\Category::where('parent_id', $category->id)->get() as $sub_category)

                <h5 class="h6"><a class="text-muted pl-3" href="/browse/{{$sub_category->slug}}">{{$sub_category->title}}</a></h5>

                @endforeach
            </div>
        @endforeach
    </div>
</div>
@endsection