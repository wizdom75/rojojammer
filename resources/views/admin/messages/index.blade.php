@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Messages</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/messages/create"><button class="button small">Add A New message</button></a> </div>
        <!-- Table contents live here -->
        @if(count($messages) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Title</th>
                    <th>From</th>
                    <th>Body</th>
                    <th>Status</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->title }}</td>
                            <td>{{ $message->from }}</td>
                            <td>{{ $message->body }}</td>
                            <td>{{ $message->is_read }}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/messages/{{ $message->id }}"><i class="fa fa-read fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    <form action="{{ url('/admin/messages' , $message->id ) }}" method="POST">
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
        {{ $messages->links() }}
        @else
            <div class="text-center">
                <h3>No messages found</h3>
            </div>
        @endif
    </div>

@endsection