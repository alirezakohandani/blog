<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'decription' => $this->body,
            'user' => $this->user->name,
            'image' => $this->image ? $this->image->url : null,
            'slug' => $this->slug,
            'type' => $this->post_type,
            'vip' => $this->is_vip ? 'vip' : 'not vip',
            'file' => $this->file ? $this->file : null,
        ];
    }
}
