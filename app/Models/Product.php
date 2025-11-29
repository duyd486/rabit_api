<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'detail',
        'quantity',
        'total_sold',
        'category_id',
    ];

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
