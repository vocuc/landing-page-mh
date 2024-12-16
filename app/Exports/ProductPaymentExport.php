<?php

namespace App\Exports;

use App\Models\ProductPayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductPaymentExport implements FromQuery, WithHeadings
{
    use Exportable;

    protected $start_time;
    protected $end_time;

    public function __construct($start_time = null, $end_time = null)
    {
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    public function query()
    {
        $query = ProductPayment::query();

        if ($this->start_time != null) {
            $query->where('created_at', ">=", $this->start_time);
        }

        if ($this->end_time != null) {
            $query->where('created_at', "<", $this->end_time);
        }

        return $query;
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
