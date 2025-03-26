<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /** @use HasFactory<\Database\Factories\ChatFactory> */
    use HasFactory;
    protected $fillable=[
        "user1_id",
        "user2_id",
    ];

    // get the first user => sender
    public function user1(){
        return $this->belongsTo(User::class,"user1_id");
    }

    // get the second user => reciever
    public function user2(){
        return $this->belongsTo(User::class,"user2_id");
    }
    // every chat contains messages
    public function messages(){
        return $this->hasMany(Message::class);
    }
    /**
     * A chat contain many users
     */
    public function users(){
        return $this->hasMany(User::class);
    }
}
