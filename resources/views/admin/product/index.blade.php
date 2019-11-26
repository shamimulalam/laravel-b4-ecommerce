@extends('layouts.admin.master')
@section('title','List of admin')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">List of Product</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Product list</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.admin._message')
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Product list</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Unit Price</th>
                                        <th>Stock</th>
                                        <th>Images</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $id=>$product)
                                            <tr>
                                                <td>{{ $products->firstItem() + $id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->unit_price }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td><a class="btn btn-info" href="{{ route('product.images',$product->id) }}">Images</a></td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('product.edit',$product->id) }}">Edit</a>
                                                    <form class="d-inline-block" method="post" action="{{ route('product.destroy',$product->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" onclick="return confirm('Are you confirm to delete?')">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ $products->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection
