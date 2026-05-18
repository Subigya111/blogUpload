<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * show all posts
     */
    public function index() 
    {
        // Url: GET /posts
        $posts=Post::all();
        return view('posts.showAllPosts',compact('posts'));


    }

    /**
     * show the form for creating a new post.
     */
    public function create()
    {
        // Url: GET /posts/create
        return view('posts.createNewPost');
    }

    /**
     * save new post.
     */
    public function store(Request $request)
    {
        // Url: POST /posts
        $validate=$request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string|min:30'
        ]);
        Post::create($validate);
        return redirect()->route('posts.index')->with('success','Added Post Successfully');
    }

    /**
     * display the specified post.
     */
    public function show(Post $post)
    {
        // Url: GET /posts/{id}
        return view('posts.showOnePost',compact('post'));

    }

    /**
     * show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        // Url: GET /posts/{id}/edit
        return view ('posts.editOnePost',compact('post'));

    }

    /**
     * update post.
     */
    public function update(Request $request, Post $post)
    {
        // Url: PUT /posts/{id}
        $validate=$request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string|min:30'
        ]);
        $post->update($validate);
        return redirect()->route('posts.index')->with('success','Post Updated Successfully');
        
    }

    /**
     * delete specified post.
     */
    public function destroy(Post $post)
    {
        // Url: DELETE /posts/{id}
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');

    }
}
