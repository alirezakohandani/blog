<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Visit;
use App\Services\CommentStore;
use Illuminate\Http\Request;



class PostController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * show list of posts
     *
     * @return void
     */
    public function show()
    {
        $posts = Post::all();
         
        return view('blogs.blog', compact('posts'));
    }

    public function showDetails($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $comments = \App\Models\Comment::where('post_id', $post->id)->get();
        
        $this->visits($post);

        return view('blogs.blog-details', compact('post', 'comments'));
        
    }

    /**
     * store comment
     */
    public function storeComment(CommentStore $comment)
    {

        $comment->store($this->request);

        return redirect()->back()->with('SuccessComment', true);
        
    }

    public function visits(Post $post)
    {

        foreach($post->visits as $vist)
        {
         if ($vist->ip == $this->request->ip() && $vist->post_id == $post->id)
         {
            return true;
         }
        }

        $vist = new Visit();
        $vist->ip = $this->request->ip();
        $vist->post_id = $post->id;
        $vist->save();
    }


}
