<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogResponseSms extends Model
{
    use HasFactory;

    protected $table = 'log_response_sms';

    protected $fillable = [
        'id',
        'phone',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];

}
