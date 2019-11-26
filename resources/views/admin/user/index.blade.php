@extends('layouts.admin.master')
@section('title','List of admin')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">List of Admin</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Admin list</li>
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
                    <h3 class="panel-title">Admin list</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        @can('admin',auth()->user())
                                            <th>Actions</th>
                                        @endcan
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $id=>$user)
                                            <tr>
                                                <td>{{ ++$id }}</td>
                                                <td>{{ ucfirst($user->role) }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><img src="{{ asset($user->image) }}" width="20%" alt=""></td>

                                                @can('admin',auth()->user())
                                                    <td>
                                                        <a class="btn btn-info" href="{{ route('user.edit',$user->id) }}">Edit</a>
                                                        <form class="d-inline-block" method="post" action="{{ route('user.destroy',$user->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" onclick="return confirm('Are you confirm to delete?')">Delete</button>
                                                        </form>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ $users->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection
