<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'id','name','slug'
    ];

    public function roles() {

        return $this->belongsToMany(Role::class,'roles_permissions');
            
     }
     
     public function users() {
     
        return $this->belongsToMany(User::class,'users_permissions');
            
     }
    use HasFactory;
}
