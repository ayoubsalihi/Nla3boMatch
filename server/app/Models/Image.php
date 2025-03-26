<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
    protected $guarded = [];
    
    // each image is posted
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
