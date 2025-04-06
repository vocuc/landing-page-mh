<?php

namespace App\Models;

use App\Enums\ProductPayments\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPayment extends Model
{
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
        'download_code',
        'price',
        'product_id',
        'voucher_id',
        'discount_price',
        'utm_source',
        'sent_mail_status'
    ];


    public static array $rules = [];

    /**
     * Tính toán giá cuối cùng (sau khi áp dụng giảm giá).
     *
     * @return float
     */
    public function calculateFinalPrice()
    {
        return  $this->price - $this->discount_price;
    }

    public function getStatusLabelAttribute()
    {
        $status = Status::tryFrom($this->status);

        return $status->getLabel();
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class, "object_target_id", "id");
    }
}
