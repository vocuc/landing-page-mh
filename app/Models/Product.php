<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    public $fillable = [
        'name',
        'short_description',
        'full_description',
        'price',
        'original_price',
        'download_url',
        'image_link',
        'is_hot',
        'is_active_voucher'
    ];

    protected $casts = [
        'name' => 'string',
        'short_description' => 'string',
        'full_description' => 'string',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'download_url' => 'string',
        'image_link' => 'string',
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'short_description' => 'required|string|max:255',
        'full_description' => 'required|string',
        'price' => 'required|numeric',
        'original_price' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'image_link' => 'required|string|max:500|url',
        'download_url' => 'required|string|max:500|url'
    ];

    
}
