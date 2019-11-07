@extends('layouts.admin.master')
@section('title','Product Images')
@section('content')
    <!-- Page-Title -->


    <div class="row">

        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Product Images</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Product Images</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{route('product.newImage',$product_id)}}">Add New</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.admin._message')
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Images</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                            <td><img width="10%" src="{{ asset($image->image) }}" alt=""></td>
                                            <td>
                                                <form class="d-inline-block" method="post" action="{{ route('product.image.update',$image->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')

                                                            <input type="file" class="btn btn-info" multiple name="image">
                                                            @error('image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror

                                                    </div>
                                                    <button class="btn btn-danger">Update</button>
                                                </form>
                                            </td>

                                            <td>
                                                <form class="d-inline-block" method="post" action="{{ route('product.image.destroy',$image->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" onclick="return confirm('Are you confirm to delete?')">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection
