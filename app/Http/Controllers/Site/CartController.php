<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function CartList(User $user)
    {   
        $cartItems = Card::where("user_id", Auth::id())->get();

        $authuser = Auth::user();

        $totalprice = 0;
        foreach($cartItems as $item){
            $totalprice += $item->products->price * $item->quantity;
        }
        return view("site.pages.card.card",compact('user','authuser','totalprice'));
    }
    public function CartAdd(Request $request){
        
        $user = Auth::user();
        
        if(count($user->address) >= 1){

            $cards = Card::all();
            $card = $cards->where('product_id',$request->product_id)->first();

            if(!empty($card)){  
                $card->quantity += $request->quantity;
                $card->save();
            }else{

                Card::updateOrCreate([
                    "user_id"=> Auth::id(),
                    "product_id"=> $request->product_id,
                    "quantity" => $request->quantity,
                ]);
            }
            return redirect()->route("cart.list",Auth::id());

        }elseif (count($user->address) <= 0){
            return redirect()->route("profile",$user->id);
        }
    }
}
