<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentStore 
{
    
    protected $comment;

    public function __construct(Comment $comment)
    {

     $this->comment = $comment;

    }

    public function store(Request $request)
    {
    
        $this->comment->user_id = Auth::id();  
        $this->comment->post_id = $request->post_id;
        $this->comment->body = $request->body;
        $this->comment->parent_id = $request->parent_id;
        return $this->comment->save();    
    }
}