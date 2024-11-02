<?php

namespace App\Services\Payment;

use App\Models\Payment;

abstract class PaymentStrategy
{
    protected $prefix;

    abstract public function genarateCode($id);

    abstract public function handleWebhook(Payment $payment, $amount);

    protected function savePaymentCode($data)
    {
        $payment = Payment::where([
            'type' => $data['type'],
            'object_target_id' => $data['object_target_id'],
            'payment_code' => $data['payment_code']
        ])->first();

        if ($payment) {
            return $payment;
        }

        return Payment::create($data);
    }
}
