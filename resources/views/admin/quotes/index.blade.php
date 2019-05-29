@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Quotes</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <!-- Table contents live here -->
        @if(count($quotes) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Product #</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotes as $quote)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $quote->id }}</td>
                            <td>{{ $quote->product_id }}</td>
                            <td>{{ $quote->name }}</td>
                            <td>{{ $quote->email }}</td>
                            <td>{{ $quote->message }}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    &nbsp;
                                    <form action="{{ url('/admin/quotes' , $quote->id ) }}" method="POST">
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
        {{ $quotes->links() }}
        @else
            <div class="text-center">
                <h3>No quotes found</h3>
            </div>
        @endif
    </div>

@endsection