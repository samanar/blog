<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SlugController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->first();
//        dd($post);
        return view('posts.show',compact('post'));

    }
}
