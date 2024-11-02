<?php

namespace App\Services\ProductPayment;

use App\Models\ProductPayment;
use Illuminate\Support\Facades\Cache;
use App\Enums\ProductPayments\Status;
use App\Services\OTP\ConcreteCreators\SendOTPConcreteCreator;

class ProductPaymentService
{
    const CACHE_KEY = 'product_payment';

    public function getPaymentCache($id, $code)
    {
        return Cache::get(self::CACHE_KEY . '_' . $id . '_' . $code);
    }

    public function setPaymentCache($id, $code)
    {
        Cache::put(self::CACHE_KEY . '_' . $id . '_' . $code, true, 86400);
    }

    public function clearPaymentCache($id, $code)
    {
        Cache::forget(self::CACHE_KEY . '_' . $id . '_' . $code);
    }

    public function updateSuccessObserver(ProductPayment $productPayment)
    {
        $statusOriginal = $productPayment->getOriginal('status');

        $status = $productPayment->getAttribute('status');

        if ($statusOriginal instanceof Status) {
            $statusOriginal = $statusOriginal->value;
        }

        if ($status instanceof Status) {
            $status = $status->value;
        }
        if ($statusOriginal != $status && $status == Status::SUCCESS->value) {
            $otpSender = SendOTPConcreteCreator::createOTPSender("product_payment", 'email_product_otp');

            $otpSender->to($productPayment->email, $productPayment->id);

            $otpSender->sent();
        }
    }
}
