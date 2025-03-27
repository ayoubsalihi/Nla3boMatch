<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;
    protected $guarded = [];

    // each message belongs to one chat
    public function chat(){
        return $this->hasOne(Chat::class);
    } 

    // each message has a sender
    public function sender(){
        return $this->hasOne(User::class,"sender_id");
    }

    // team_chat is remaining
}
