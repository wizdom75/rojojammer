@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Categories</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/categories/create"><button class="button small">Add A New Category</button></a> </div>
        <!-- Table contents live here -->
        @if(count($categories) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Parent Category</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Blurb</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $category->id }}</td>
                            <td>{{ ($category->parent_id == 0)?'--Root--':\App\Category::find($category->parent_id)->title }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{!! $category->blurb !!}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/categories/{{ $category->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    <form action="{{ url('/admin/categories' , $category->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="button alert small"><i class="fa fa-trash fa-fw"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
        @else
            <div class="text-center">
                <h3>No categories added yet</h3>
            </div>
        @endif
    </div>

@endsection