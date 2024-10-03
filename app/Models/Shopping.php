<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function details()
    {
        return $this->hasMany(DetailShop::class);
    }

    /*     public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    } */
}
