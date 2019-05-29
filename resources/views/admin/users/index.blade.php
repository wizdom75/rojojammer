@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Users</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/users/create"><button class="button small">Add A New User</button></a> </div>
        <!-- Table contents live here -->
        @if(count($users) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->is_admin)
                            <td>Admin</td>
                            @else
                            <td>Customer</td>
                            @endif
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/users/{{ $user->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    @if(!$user->is_admin)
                                    <form action="{{ url('/admin/users' , $user->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="button alert small"><i class="fa fa-trash fa-fw"></i> Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
        @else
            <div class="text-center">
                <h3>No users added yet</h3>
            </div>
        @endif
    </div>

@endsection