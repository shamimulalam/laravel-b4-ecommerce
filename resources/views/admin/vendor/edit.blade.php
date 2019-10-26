@extends('layouts.admin.master')
@section('title','Vendor Update')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Update Vendor Info</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Update Vendor</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Vendor Update Form</h3></div>
                <div class="panel-body">
                    <form action="{{ route('vendor.update',$vendor->id) }}" class="form-horizontal" method="post">
                        @csrf
                        @method('put')
                        @include('admin.vendor._form')
                        <button class="btn btn-info pull-right" type="submit">Update</button>
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
@endsection
