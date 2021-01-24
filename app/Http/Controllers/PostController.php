<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Visit;
use Illuminate\Http\Request;



class PostController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function show()
    {
        $posts = Post::all();
         
        return view('blogs.blog', compact('posts'));
    }

    public function showDetails($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $comments = \App\Models\Comment::where('post_id', $post->id)->get();
        
        foreach($post->visits as $vist)
        {
         if ($vist->ip == $this->request->ip() && $vist->post_id == $post->id)
         {
            return view('blogs.blog-details', compact('post', 'comments'));
         }
        }

        $vist = new Visit();
        $vist->ip = $this->request->ip();
        $vist->post_id = $post->id;
        $vist->save();

        return redirect()->back();

    }

    public function storeComment($slug, Comment $comment)
    {
        
        $post = Post::where('slug', $slug)->first();

        $comment->user_id = 2;
        $comment->post_id = $this->request->post_id;
        $comment->body = $this->request->body;
        $comment->parent_id = $this->request->parent_id;
        $comment->save();  
    }


}
