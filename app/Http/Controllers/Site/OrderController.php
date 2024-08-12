<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function Orders(User $user){

        return view("site.pages.orders.orders",compact("user"));
    
    }



    public function OrderCreate(Request $request){
        $user = Auth::user();
        if(count($user->address) >= 1){

            $cartItems = Card::where("user_id",Auth::id())->get();

            if($cartItems->isEmpty()){
                return redirect()->back()->with("error","Sepetinizde Ürün Yok !");
            }

            $totalprice = 0;
            foreach($cartItems as $item){
                $totalprice += $item->products->price * $item->quantity;
            }

            $order = Order::create([
                "user_id"=>Auth::id(),
                "total_price"=> $totalprice,
                "status" => "0",
            ]);

            foreach($cartItems as $item){
                OrderDetail::create([
                    "product_id" => $item->products->id,
                    "order_id" => $order->id,
                    "quantity" => $item->quantity,
                    "price" => $item->products->price,
                ]);
            }

            Card::where("user_id",Auth::id())->delete();

            Stripe::setApiKey(env("STRIPE_SECRET"));

            $charge = Charge::create([
                "amount" => $totalprice * 100,
                "currency" => "try",
                "source" => $request->stripeToken,
                "description"=> 'Order ID: ' . $order->id,
            ]);

            if($charge->status == 'succeeded'){
                $order->status = '1';
                $order->save();
                return redirect()->route('index', $order->id)->with('success', 'Siparişiniz başarılı bir şekilde oluşturuldu.');
            } else {
                $order->status = '0';
                $order->save();
                return redirect()->route('login')->with('error', 'Ödeme başarısız oldu.');
            }
        }elseif (count($user->address ) <= 0) {

            return redirect()->route('profile',$user->id);
        }
    }


    public function OrderProcess(Request $request){
        
        if(empty($request->order_id)){
            return back()->withErrors('Detayını Görmek İçin Ürünü Seçiniz');
        }

        if($request->action == 'delete'){

            return redirect()->route('order.delete',$request->order_id);

        }elseif ($request->action == 'detail'){
            
            return redirect()->route('order.detail',$request->order_id);

        }
    }


    public function OrderDetail(Order $order){

        if(Auth::id() == $order->user_id){
            return view('site.pages.orders.orderdetail',compact('order'));
        }

        return redirect('/login');

    }

    public function OrderDelete(Order $order){

        if(Auth::id() == $order->user_id){

            $order->delete();
            OrderDetail::where('order_id',$order->id)->delete();

            return redirect()->route('orders',Auth::id());
        }

        return redirect('/login');
    }
}
