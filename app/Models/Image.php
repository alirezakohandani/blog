<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get the parent imageable model (user or post)
     *
     * @return void
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
