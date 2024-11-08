<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    public $fillable = [
        'name',
        'price',
        'original_price'
    ];

    protected $casts = [
        'name' => 'string',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'original_price' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
