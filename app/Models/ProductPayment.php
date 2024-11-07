<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPayment extends Model
{
    const PRICE = 100000;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'phone',
        'status',
        'download_code'
    ];
}
