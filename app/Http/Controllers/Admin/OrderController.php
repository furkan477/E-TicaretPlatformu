<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function OrderList()
    {
        $orders = Order::orderBy("created_at","desc")->get();
        return view("admin.pages.orderlist", compact("orders"));
    }

    public function OrderDetail(Order $order){
        $address = $order->user->address->first();
        $detail = $order->orderDetail->first();
        return view("admin.pages.orderdetail", compact("order",'detail','address'));
    }

    public function OrderEdit(Order $order){
        $address = $order->user->address->first();
        $detail = $order->orderDetail->first();
        return view('admin.pages.orderedit', compact('order','address','detail'));
    }

    public function OrderDelete(Order $order){
        
        $order->status = '0';
        $order->save();

        return redirect()->back();
    }

    public function OrderUpdate(OrderRequest $request, Order $order){
        $order->status = $request->status;
        $order->total_price = $request->total_price;
        $order->save();

        $detail = OrderDetail::where('order_id', $order->id)->first();
        $detail->quantity = $request->quantity;
        $detail->save();

        return redirect()->back()->withSuccess("Sipariş Güncelleme İşlemi Başarılı !");
    }

}
