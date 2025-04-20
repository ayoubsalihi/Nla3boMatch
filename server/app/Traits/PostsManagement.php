<?php

namespace App\Traits;

use App\Models\Posts\Post;

trait PostsManagement
{
    /**
     * An image or a video are belong to a post
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
