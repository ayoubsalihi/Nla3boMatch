<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\IsUser;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory , IsUser;
    protected $guarded =[];
    
    /**
     * The roles should be stored in the database , and each admin has many roles
     */
    public function roles(){
        return $this->belongsToMany(Role::class,'admin_role')
                    ->withPivot('type');
    }
}
