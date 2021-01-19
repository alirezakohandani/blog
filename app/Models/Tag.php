<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The posts belong to the tag
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
