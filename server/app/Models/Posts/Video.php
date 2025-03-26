<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;
    protected $guarded = [];
    /**
     * A video belongs to only one post
     */
    public function post(){
        return $this->hasOne(Post::class);
    }
}
