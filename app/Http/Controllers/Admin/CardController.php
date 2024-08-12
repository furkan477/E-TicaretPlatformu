<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function CardList()
    {
        $cards = Card::orderBy("created_at","desc")->get();
        return view("admin.pages.cardlist", compact("cards"));
    }

    public function CardEdit(Card $card)
    {
        $address = $card->user->address->first();
        return view("admin.pages.cardedit", compact("card","address"));
    }

    public function CardUpdate(Card $card , CardRequest $request)
    {
        $card->update($request->all());
        return back()->withSuccess("Sepet Güncelleme İşlemi Başarılı");
    }

    public function CardDelete(Card $card)
    {
        $card->delete();
        return redirect()->back();
    }
}
