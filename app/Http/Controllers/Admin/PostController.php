<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show form in admin dashboard
     *
     * @return void
     */
    public function show()
    {
        return view('admin.admin');
    }

    /**
     * store post
     *
     * @param Request $request
     */
    // public function store(Request $request, Post $post)
    // {
        
    // }


    // public function validation(Request $request)
    // {

    // }


}
