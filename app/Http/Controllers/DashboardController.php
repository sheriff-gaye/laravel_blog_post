<?php

namespace App\Http\Controllers;

use App\Mail\postLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;


class DashboardController extends Controller
{

    public function index(Post $post,Request $request)
    {
        $user=auth()->user();


        // Mail::to('sheriffgaye5@gmail.com')->send(new postLiked());


        return view('layouts.dashboard');



    }
}
