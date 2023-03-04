<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

     public $table='members';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function permissions(){
       
        // return $this->user_menu_mapping->role_menu_mapping();
        // return $this->hasMany(UserRoleMapping::class, 'user_id', 'id');
        // return $this->hasManyThrough(
        //     RoleMenuMapping::class, //final
        //     UserRoleMapping::class, //intermediate
        //     'user_id', // Foreign key on the UserRoleMapping table... intermediate table
        //     'role_id', // Foreign key on the RoleMenuMapping table...
        //     'id', // Local key on the member table...
        //     'role_id' // Local key on the UserRoleMapping table...
        // );
        
    }
}
