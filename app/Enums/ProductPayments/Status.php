<?php

namespace App\Enums\ProductPayments;

enum Status: int
{
    case WAIT = 0;

    case SUCCESS = 1;
}
