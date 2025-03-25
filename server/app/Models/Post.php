<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Match_;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $guarded = [];

    // each post have been released by a user
    public function user(){
        return $this->hasOne(User::class);
    }

    // each post is related to one match
    public function match(){
        return $this->belongsTo(Match::class);
    }
}
