<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');

    }
    public function store(Post $post , Request $request)
    {

        $post->like()->create(['user_id'=>$request->user()->id]);

        return back();
    }

    public function destroy(Post $post ,Request $request)
    {
        $request->user()->like()->where('post_id',$post->id)->delete();

        return back();
    }
}
