<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleMapping extends Model
{
    protected $table = 'user_role_mapping';
    use HasFactory;
    public function role_menu_mapping()
    {
        return $this->hasMany(RoleMenuMapping::class, 'role_id', 'role_id');
    }
}
