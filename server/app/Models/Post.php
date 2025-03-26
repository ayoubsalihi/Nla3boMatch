<?php

namespace App\Models;

use App\Models\Competition;
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
}
