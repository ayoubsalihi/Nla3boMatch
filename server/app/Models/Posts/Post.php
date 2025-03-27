<?php

namespace App\Models\Posts;

use App\Models\Competitions\Competition;
use App\Models\Competitions\Partido;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $guarded = [];

    // each post have been released by a user
    public function user(){
        return $this->hasOne(User::class);
    }

    // each post could be related to a match
    public function match(){
        return $this->belongsTo(Partido::class);
    }
    // each post could be related to a competition
    public function competition(){
        return $this->belongsTo(Competition::class);
    }
    /**
     * A post can be an image
     */
    public function image(){
        return $this->hasMany(Image::class);
    }
    /**
     * A post can have one or many videos
     */
    public function video(){
        return $this->hasMany(Video::class);
    }
}
