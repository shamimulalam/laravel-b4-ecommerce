@extends('layouts.admin.master')

@section('title','Order List')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Order List</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="active">Order list</li>
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
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="panel-title">Order list</h3>
                        </div>
                        <div class="col-md-8">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input value="{{ request()->search }}" class="form-control" type="text" name="search" placeholder="Search here">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('order.export') }}" class="btn btn-default">Export</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice Id</th>
                                        <th>Client</th>
                                        <th>Shipping Address</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Order date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $id=>$order)
                                            <tr>
                                                <td>{{ ++$id }}</td>
                                                <td>{{ $order->invoice_id }}</td>
                                                <td>
                                                    @if($order->client != null)
                                                    {{ $order->client->name }}
                                                    <br>
                                                    {{ $order->client->email }}
                                                    <br>
                                                    {{ $order->client->phone }}
                                                        @endif
                                                </td>
                                                <td>
                                                    @if($order->client != null)
                                                    {{ $order->client->address }}
                                                    @endif
                                                </td>
                                                <td>{{ $order->total_amount }}</td>
                                                <td>{{ $order->payment_status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>
                                                    <form action="{{ route('order.declined',$order->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button class="btn btn-info">Declined</button>
                                                    </form>
                                                    <form action="{{ route('order.delivered',$order->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button class="btn btn-warning">Delivered</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ $orders->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection
