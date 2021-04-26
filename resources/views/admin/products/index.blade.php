@extends('layouts.admin')
@section('content')

    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title">Products</span>
        </div>
    </div>
    
    <div class="dashboard admin_shared">
        <div class="text-right"> <a href="/admin/products/create"><button class="button small">Add A New Product</button></a> </div>
        <!-- Table contents live here -->
        @if(count($products) > 0)
        <table class="table-expand">
            <thead>
                <tr class="table-expand-row">
                    <th width="20">#</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Specs</th>
                    <th>Details</th>
                    <th class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                        <tr class="table-expand-row" data-open-details>
                            <td>{{ $product->id }}</td>
                            <td>{{ @\App\Category::find($product->category_id)->title }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{!! $product->specs !!}</td>
                            <td>{!! $product->details !!}</td>
                            <td class="text-center">
                                <div class="button-group">
                                    <a class="button warning small" href="/admin/products/{{ $product->id }}/edit"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Edit</a>
                                    &nbsp;
                                    <form action="{{ url('/admin/products' , $product->id ) }}" method="POST">
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
        {{ $products->links() }}
        @else
            <div class="text-center">
                <h3>No products added yet</h3>
            </div>
        @endif
    </div>

@endsection