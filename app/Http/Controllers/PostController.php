<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Provider\ar_JO\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class PostController extends Controller
{
    
    public function show()
    {
        $posts = Post::all();
         
        return view('blogs.blog', compact('posts'));
    }

    public function showDetails($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('blogs.blog-details', compact('post'));
    }

    public function storeComment($slug, Request $request)
    {
        $post = Post::where('slug', $slug)->first();
        $comment = new Comment();

        $comment->user_id = 2;
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->save();  
    }
}
