<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function show()
    {
        $posts = Post::all();
        return view('admin.accessControll', compact('posts'));
    }
}
