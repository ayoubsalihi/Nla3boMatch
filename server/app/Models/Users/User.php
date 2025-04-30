<?php

namespace App\Models\Users;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * A user could be admin 
     */
    public function admin(){
        return $this->hasOne(Admin::class);
    }
    /**
     * A user can be player
     */
    public function player(){
        return $this->hasOne(Player::class);
    }
    /**
     * Every user have many chats
     */
    public function chats(){
        return $this->hasMany(Chat::class,"user1_id","id")
            ->orWhere("user2_id","=",$this->id);
    }

    public function getOwner(){
        return $this->admin ?? $this->player;
    }
    
}
