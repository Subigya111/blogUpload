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
      return redirect()->route('')->with('success','Comment Added');
    }
}
