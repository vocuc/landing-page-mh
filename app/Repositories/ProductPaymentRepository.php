<?php

namespace App\Repositories;

use App\Models\ProductPayment;
use App\Repositories\BaseRepository;

class ProductPaymentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_name',
        'email',
        'phone',
        'status',
        'download_code',
        'price',
        'discount_price',
        'product_id',
        'voucher_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ProductPayment::class;
    }
}
