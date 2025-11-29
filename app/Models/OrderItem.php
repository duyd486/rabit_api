<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'quantity',
        'total_price',
        'product_id',
        'bill_id',
    ];
}
