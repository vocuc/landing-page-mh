<?php

namespace App\Enums\Vouchers;

enum VoucherType: int
{
    case PERCENT = 1;

    case AMOUNT = 0;
}
