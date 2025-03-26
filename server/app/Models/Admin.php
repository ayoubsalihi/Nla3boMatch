<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    protected $guarded =[];

    // each admin is a user
    public function user(){
        return $this->hasOne(User::class);
    }
    /**
     * The roles should be stored in the database , and each admin has many roles
     */
    public function roles(){
        return $this->belongsToMany(Role::class,'admin_role')
                    ->withPivot('type');
    }
}
