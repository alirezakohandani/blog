<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

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
    public function store(Request $request, Post $post)
    {

        $post->title =  $request->title;
        $post->body =  $request->body;
        $post->slug = $request->slug;
        $post->is_vip = $request->vip;
        $post->post_type = $request->post_type;
        $post->file = 'test.mp4';

      
        $post->save();

        $post->categories()->attach($request->category);

        $request->merge([
            'tags' => explode(',', $request->get('tag')),
        ]);

        $request->validate([
            'tags' => 'array',
            'tags.*' => 'unique:tags,name',
        ]);
        foreach($request->tags as $name) {
        Tag::create([
            'name' => $name,
        ]
        );
      $post->tags()->attach(Tag::where('name', $name)->first()->id); 
    }

        return redirect()->back();

    }


    // public function validation(Request $request)
    // {

    // }


}
