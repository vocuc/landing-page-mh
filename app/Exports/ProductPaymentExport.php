<?php

namespace App\Exports;

use App\Models\ProductPayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductPaymentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductPayment::all();
    }


    public function headings(): array
    {
        return [
            '#',
            'user_name',
            'email',
            'phone',
            'status',
            'created_at',
            'updated_at',
            'download_code',
            'price',
            'discount_price',
            'product_id',
            'voucher_id',
            'utm_source',
            'sent_mail_status'
        ];
    }
}
