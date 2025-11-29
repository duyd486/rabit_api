<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'addresses',
        'phone',
        'user_id',
    ];
}
