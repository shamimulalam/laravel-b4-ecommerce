@extends('layouts.admin.master')
@section('title','Create new admin')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Create new Admin</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Create admin</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Admin Form</h3></div>
                <div class="panel-body">
                    <form action="{{ route('user.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Name</label>
                            <div class="col-md-10">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Email</label>
                            <div class="col-md-10">
                                <input type="email" value="{{ old('email') }}" id="example-email" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Confirm Password</label>
                            <div class="col-md-10">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Image</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-info pull-right" type="submit">Save</button>
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
@endsection
