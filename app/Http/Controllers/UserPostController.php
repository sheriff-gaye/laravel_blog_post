<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user, )
    {

        $posts=$user->post()->with(['user','like'])->latest()->paginate(5);
        return view('user.post.index',[
            'user'=>$user,
            'posts'=>$posts
        ]);
    }
}
