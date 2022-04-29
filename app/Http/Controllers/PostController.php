<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->with(['user','like'])->paginate(4);
        return view('post.index',compact('posts'));

    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'body'=>'required|max:255'
        ]);


        $request->user()->post()->create($request->only('body'));
        return redirect()->route('post')->with('message','Post Created Successfully');

    }

    public function edit(Post $post)
    {
        return view('post.edit',['post'=>$post]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'body'=>'required|max:255'
        ]);

        $post=Post::find($id);
        $post->update($request->only('body'));
        return redirect()->route('post')->with('message','Post Updated Successfully');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post')->with('message','Post Deleted Successfully');
    }
}
