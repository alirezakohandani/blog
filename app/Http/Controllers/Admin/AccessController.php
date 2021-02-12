<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * show posts list
     *
     * @return void
     */
    public function show()
    {
        $posts = Post::all();
        return view('admin.accessControll', compact('posts'));
    }

    /**
     * signs unsigned posts
     *
     * @param Request $request
     * @return void
     */
    public function sign(Request $request)
    {
        $post = Post::where('id', $request->post_id)->first();
        if ($post->status == 'published') {
            return redirect()->back()->with('dontAllowSign', true);
        }
        $post->update(['status' => 'published']);
        return redirect()->back()->with('signed', true);
    }
}
