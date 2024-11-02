<?php

namespace App\Services\Payment;

use App\Models\Payment;

class PaymentStrategyContext
{
    private $paymentStrategy;

    public function __construct(PaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function SetStrategy(PaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function getPaymentCode($id)
    {
        return $this->paymentStrategy->genarateCode($id);
    }

    public function handleWebhook(Payment $payment, $amount)
    {
        return $this->paymentStrategy->handleWebhook($payment, $amount);
    }
}
