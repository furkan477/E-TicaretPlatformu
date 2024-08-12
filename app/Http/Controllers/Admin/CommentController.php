<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function CommentList(){

        $comments = Comment::all();
        return view("admin.pages.commentlist",compact("comments"));

    }

    public function CommentEdit(Comment $comment){
        return view("admin.pages.commentedit",compact("comment"));
    }   

    public function CommentUpdate(CommentRequest $request , Comment $comment){
        $comment->update($request->all());
        return back()->withSuccess("Yorum Güncelleme Başarılı");
    }
}
