<?php

namespace App\Models\Users;

use App\Models\Teams\TeamChat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;
    protected $guarded = [];

    // each message belongs to one chat
    public function chat(){
        return $this->belongsTo(Chat::class);
    } 

    // each message has a sender
    public function sender(){
        return $this->belongsTo(User::class,"sender_id");
    }

    public function teamchat(){
        return $this->belongsTo(TeamChat::class,"team_chat_id");
    }
}
