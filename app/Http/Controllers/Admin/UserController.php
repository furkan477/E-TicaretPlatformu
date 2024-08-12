<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\User;
use App\Models\UserAdress;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserList(){
        $users = User::all();
        return view("admin.pages.userlist",compact("users"));
    }

    public function UserDelete(User $user){
        
        Card::where("user_id",$user->id)->delete();
        Comment::where("user_id",$user->id)->delete();
        Contact::where("user_id",$user->id)->delete();
        UserAdress::where("user_id",$user->id)->delete();
        Order::where("user_id",$user->id)->delete();
        $user->delete();

        return back()->with("success","Kullanıcı Başarıyla Silinmiştir.");
    }   

    public function UserDetail (User $user){
        return view("admin.pages.userdetail",compact("user"));
    }
}
