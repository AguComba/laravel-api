<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'nombre'
    ];

    protected $casts = [
        'birthday' => 'date:d-m-Y',
        'create_time' => 'datetime:d-m-Y H:m:s'
    ];
}
