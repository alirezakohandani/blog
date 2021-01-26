<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::paginate(10);

        return response()->json(new PostCollection($posts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatePost($request);

        Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
            'post_type' => $request->post_type,
            'file' => $request->file,
        ]);

        if ($request->post_type !== 'article') {
            $this->uploadImage($request);
        }

        return response()->json([
            'status' => 'success',
            'data' => 'post created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => [
                'post' => new PostResource($post),
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $post = Post::findOrFail($id);

       $post->update($request->all());

       return response()->json([
           'status' => 'success',
           'data' => 'update Ok',
       ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json([
            'status' => 'success',
            'data' => 'delete Ok',
        ]);
    }

    private function validatePost($request)
    {

        $request->validate([
            'user_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'slug' => ['nullable', 'unique:posts'],
            'post_type' => ['required'],
            'file' => ['nullable'],
            'is_vip' => ['numeric'],
            'status' => ['string'],

        ]);
    }

    private function uploadImage($request)
    {
        return $request->post_type == 'video'
            ? $request->file('file')->store('public/videos')
            : $request->file('file')->store('public/podcasts'); 
    }
}
