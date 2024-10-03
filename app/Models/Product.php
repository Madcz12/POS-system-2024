<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'stock',
        'min_stock',
        'max_stock',
        'buy_price',
        'sell_price',
        //'ingreso_date',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
