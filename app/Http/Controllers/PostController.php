<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        $posts = Post::all();

        return view('blogs.blog', compact('posts'));
    }
}
