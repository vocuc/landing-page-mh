<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $table = 'vouchers';

    public $fillable = [
        'code',
        'type',
        'value'
    ];

    protected $casts = [
        'code' => 'string',
        'type' => 'boolean',
        'value' => 'decimal:2'
    ];

    public static array $rules = [
        'code' => 'required|string|max:255',
        'type' => 'required|boolean',
        'value' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getTypeLabelAttribute()
    {
        return $this->type == \App\Enums\Vouchers\VoucherType::PERCENT->value ? 'Phần trăm' : 'Giá tiền';
    }
}
