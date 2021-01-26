<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
     /**
     * store comment
     */
    public function store(Request $request)
    {
  

            $comment = new Comment();

            $comment->user_id = Auth::id();  
            $comment->post_id = $request->post_id;
            $comment->body = $request->body;
            $comment->parent_id = $request->parent_id;
            $comment->save();    

            return redirect()->back()->with('SuccessComment', true);
        
    }
}
