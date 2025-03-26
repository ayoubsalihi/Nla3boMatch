<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
    protected $fillable= ['name'];
    /**
     * Each admin has many roles
     */
    public function admins(){
        return $this->belongsToMany(Admin::class,"admin_role")->withPivot("type");
    }
}
