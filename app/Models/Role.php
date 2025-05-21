<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    const ROLE_ADMIN = 'admin';
    const ROLE_CUSTOMER = 'customer';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
