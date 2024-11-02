<?php

namespace App\Models;

use App\Repositories\Payment\Enums\TypePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_code',
        'type',
        'object_target_id'
    ];
}
