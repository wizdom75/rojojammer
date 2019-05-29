@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Pages</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/pages/create"><button class="button small">Add A New page</button></a> </div>
        <!-- Table contents live here -->
        @if(count($pages) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Body</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{!! $page->body !!}</td>
                            <td>
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/pages/{{ $page->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    <form action="{{ url('/admin/pages' , $page->id ) }}" method="POST">
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
        {{ $pages->links() }}
        @else
            <div class="text-center">
                <h3>No pages added yet</h3>
            </div>
        @endif
    </div>

@endsection