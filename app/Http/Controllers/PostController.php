<?php

namespace App\Http\Controllers;

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

        $address = 'http://localhost/laravel8-blog/'; 
        return view('blogs.blog', compact('posts','address'));
    }
}
