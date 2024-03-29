<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model implements Authenticatable
{
    
    use AuthenticatableTrait, HasFactory, HasApiTokens;

    protected $table = "user_customer";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'date_input',
    ];

    public $timestamps = false;

    protected $hidden = [
        'password'
    ];
}
