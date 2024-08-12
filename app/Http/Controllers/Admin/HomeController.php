<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Card;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $order = Order::all();
        $card = Card::all();
        $contact = Contact::all();
        $comment = Comment::all();
        $product = Product::all();

        return view("admin.pages.index", compact("user","order","card","contact","comment","product"));
    }
}
