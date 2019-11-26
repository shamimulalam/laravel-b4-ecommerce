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
                <div class="panel-heading"><h3 class="panel-title">Import Admin</h3></div>
                <div class="panel-body">

                    <form action="{{ route('user.import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import">
                        <button class="btn btn-info pull-right" type="submit">import</button>
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Admin Form</h3></div>
                <div class="panel-body">

                    <form action="{{ route('user.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.user._form')
                        <button class="btn btn-info pull-right" type="submit">Save</button>
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
@endsection
