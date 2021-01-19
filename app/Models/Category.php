<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * the posts that belong to the category 
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
