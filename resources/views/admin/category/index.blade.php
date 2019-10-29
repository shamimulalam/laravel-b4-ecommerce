@extends('layouts.admin.master')

@section('title','Category List')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Category List</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Category list</li>
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
                    <h3 class="panel-title">Category list</h3>
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
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $id=>$category)
                                            <tr>
                                                <td>{{ ++$id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>{{ $category->status }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('category.edit',$category->id) }}">Edit</a>
                                                    <form style="display: inline-block" class="d-inline-block" method="post" action="{{ route('category.destroy',$category->id) }}">
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
                                    {{ $categories->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection
