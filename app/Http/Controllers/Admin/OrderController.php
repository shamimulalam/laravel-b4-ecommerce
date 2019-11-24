<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::with(['client']);
        if(isset($request->search) && $request->search != null)
        {
            $order = $order->where('invoice_id','like','%'.$request->search.'%');
            $order = $order->orWhere('total_amount','like','%'.$request->search.'%');
            $order = $order->orWhere('payment_status','like','%'.$request->search.'%');
        }
        $order = $order->orderBy('id','desc')->paginate(10);
        if(isset($request->search) && $request->search != null)
        {
            $render['search'] = $request->search;
            $order = $order->appends($render);
        }
        $data['orders'] = $order;
        return view('admin.order.index',$data);
    }
}
