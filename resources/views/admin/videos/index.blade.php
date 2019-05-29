@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Videos</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/videos/create"><button class="button small">Add A New Video</button></a> </div>
        <!-- Table contents live here -->
        @if(count($videos) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Title</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $video->id }}</td>
                            <td>{{ $video->title }}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/videos/{{ $video->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    <form action="{{ url('/admin/videos' , $video->id ) }}" method="POST">
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
        {{ $videos->links() }}
        @else
            <div class="text-center">
                <h3>No videos added yet</h3>
            </div>
        @endif
    </div>

@endsection