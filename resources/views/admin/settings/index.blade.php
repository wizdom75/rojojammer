@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Settings</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        @if(count($settings) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Post Code</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $setting->phone }}</td>
                            <td>{{ $setting->email }}</td>
                            <td>{!! $setting->address !!}</td>
                            <td>{{ $setting->postcode }}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/settings/{{ $setting->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    @if(!$setting)
                                    <form action="{{ url('/admin/settings' , $setting->id ) }}" method="POST">
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
        {{ $settings->links() }}
        @else
            <div class="text-center">
                <h3>No settings added yet</h3>
                <div class="text-center"> 
                    <a href="/admin/settings/create">
                        <button class="button large">Add Settings</button>
                    </a> 
                </div>
            </div>
        @endif
    </div>

@endsection