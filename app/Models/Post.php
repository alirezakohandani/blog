<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Searchable, Sortable;

    protected $fillable = [
        'status'
    ];

    public $searchableColumns = ['title', 'body'];
    
    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post's image
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * the categories that belongs to post
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * the tags that belongs to post
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    // if_category_exists
    public function getIfCategoryExistsAttribute()
    {
        return $this->Categories()->first() ? $this->Categories()->first()->category : 'no category';
    }

    public function getImageUrlAttribute()
    {
        return $this->image == null 
        ? asset(config('post.imgName')) 
        : asset('/storage/' . $this->image->url);
    }

    /**
     * accessor for published posts
     */
    public function getStatusIsPublishedAttribute()
    {
        return $this->status == 'published' 
                ? 'disabled'
                : '';
    }

    /**
     * accessor for draft posts
     */
    public function getStatusIsDraftAttribute()
    {
        return $this->status == 'draft'
                ? 'disabled'
                : '';
    }
}
