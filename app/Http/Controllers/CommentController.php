<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
class CommentController extends Controller
{
    public function storeComment(CommentRequest $request){
      $validated=$request->validated();
      Comment::create([
        'comment'=>$validated['comment']
      ]);
      $comments=Comment::all();
      compact($comments);
      return redirect()->route('posts.index')->with('success','Comment Added');
    }
}
