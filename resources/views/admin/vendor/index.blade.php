@extends('layouts.admin.master')
@section('title','List of vendors')
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
                    <h3 class="panel-title">All Vendors</h3>
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
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vendors as $id=>$vendor)
                                            <tr>
                                                <td>{{ ++$id }}</td>
                                                <td>{{ $vendor->name }}</td>
                                                <td>{{ $vendor->email }}</td>
                                                <td>{{ $vendor->address }}</td>
                                                <td>{{ $vendor->status }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('vendor.edit',$vendor->id) }}">Edit</a>
                                                    <form class="d-inline-block" method="post" action="{{ route('vendor.destroy',$vendor->id) }}">
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
                                    {{ $vendors->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection
