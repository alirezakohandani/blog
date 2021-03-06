<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Show posts list
     *
     * @return void
     */
    public function show()
    {
        $postQuery = Post::singleSearch();
        $posts = $postQuery->orderBy('id', 'desc')->get();
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
        Post::where('id', $request->post_id)->update(['status' => 'published']);
        return redirect()->back()->with('signed', true);
    }

    /**
     * reject the post to the author
     *
     * @param Request $request
     * @return void
     */
    public function reject(Request $request)
    {
        Post::where('id', $request->post_id)->update(['status' => 'draft']);
        return redirect()->back()->with('rejected', true);
    }
}
