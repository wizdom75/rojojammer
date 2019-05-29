@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Banners</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/banners/create"><button class="button small">Add A New Banner</button></a> </div>
        <!-- Table contents live here -->
        @if(count($banners) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>TITLE</th>
                    <th>LINK</th>
                    <th>PATH</th>
                    <th class="text-center" width="200">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->link }}</td>
                            <td>{{ $banner->path }}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/banners/{{ $banner->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    <form action="{{ url('/admin/banners' , $banner->id ) }}" method="POST">
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
        {{ $banners->links() }}
        @else
            <div class="text-center">
                <h3>No banners added yet</h3>
            </div>
        @endif
    </div>

@endsection