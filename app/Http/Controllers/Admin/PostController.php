<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

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
        
        $this->validateForm($request);

        $post->user_id = Auth::id();
        $post->title =  $request->title;
        $post->body =  $request->body;
        $post->slug = $request->slug;
        $post->is_vip = $request->vip;
        $post->post_type = $request->post_type;
        $post->file = ($post->post_type !== 'article') 
                        ? $request->file->getClientOriginalName() 
                        : null;

        if ($request->post_type !== 'article') {
            $this->uploadImage($request, $post);
         }               
        
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

    private function uploadImage($request)
    {
  
        return $request->post_type == 'video'
            ? $request->file('file')->store('public/videos') 
            : $request->file('file')->store('public/podcasts');
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'user_id' => ['numeric'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'slug' => ['nullable', 'unique:posts'],
            'post_type' => ['required'],
            'file' => ['nullable'],
            'image' => ['nullable', 'mimes:jpg,bmp,png'],
            'is_vip' => ['numeric'],
            'status' => ['string'],
        ]);
    }
}
