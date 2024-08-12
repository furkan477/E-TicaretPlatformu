<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function CommentCreate(CommentRequest $request , Product $product){

        Comment::create([
            "user_id" => Auth::id(),
            "product_id"=> $product->id,
            "comment"=> $request->comment,
            "rating"=> "0",
            "status" => "0",
        ]);
        
        return back()->withSuccess("Yorum Başarılı Bir Şekilde Göderilmiştir");
    }

    public function CommentDelete(Comment $comment){

        if(Auth::id() == $comment->user_id){

            $comment->delete();

            return back()->withSuccess("Yorum Silme İşlemi Başarıyla Gerçekleşmiştir.");
        }

        return redirect('/login');
    }
}
