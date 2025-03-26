<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    /** @use HasFactory<\Database\Factories\FriendshipFactory> */
    use HasFactory;
    protected $guarded =[];

    // on friendhips there is many users
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
