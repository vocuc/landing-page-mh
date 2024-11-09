<?php

namespace App\Enums\ProductPayments;

enum Status: int
{
    case WAIT = 0;

    case SUCCESS = 1;

    case DOWNLOADED = 2;

    public function getLabel()
    {
        return match ($this) {
            self::WAIT => 'Chưa thanh toán',
            self::SUCCESS => 'Đã thanh toán',
            self::DOWNLOADED => 'Đã tải xuống',
        };
    }
}
