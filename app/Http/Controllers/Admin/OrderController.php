<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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
    public function export()
    {
        return Excel::download(new OrdersExport,'orders.xlsx');
    }
    public function delivered($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->status = Order::STATUS_DELIVERED;
        $order->save();
        session()->flash('message','Order has been delivered successfully');
        return redirect()->back();

    }
    public function declined($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->status = Order::STATUS_DECLINED;
        $order->save();
        session()->flash('message','Order has been declined');
        return redirect()->back();

    }
}
