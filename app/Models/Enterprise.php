<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'state',
        'city',
        'name',
        'ent_type',
        'nit',
        'phone',
        'email',
        'tax_ammount',
        'tax_name',
        'currency',
        'address',
        'post_code',
        'logo',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
