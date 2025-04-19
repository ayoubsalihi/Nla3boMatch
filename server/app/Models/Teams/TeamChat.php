<?php

namespace App\Models\Teams;

use App\Models\Users\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamChat extends Model
{
    /** @use HasFactory<\Database\Factories\TeamChatFactory> */
    use HasFactory;
    protected $guarded =[];
    // each team chat belongs to a specific team
    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
