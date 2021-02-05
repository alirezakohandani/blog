<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    public function show()
    {
        $posts = collect(Post::all('thumb'));
        $thumbs = collect();
         foreach ($posts as $value) 
         {
             $thumbs[] = $value->thumb ;
         }
         
        $thumbs = $thumbs->countBy()->all();
        $sum = array_sum($thumbs);

        return view('admin.Analytic', compact('thumbs', 'sum'));
    }
}
