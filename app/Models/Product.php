<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
