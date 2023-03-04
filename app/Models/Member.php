<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{


    public $check=[
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required|email',
        'password' => 'min:4|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:4',
        'number'=>'required'
    ];
    use HasFactory;
    
  
}
