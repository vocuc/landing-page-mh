<?php

namespace App\Services\Payment;

use App\Enums\Payments\TypePayment;
use App\Enums\ProductPayments\Status;
use App\Models\Payment;
use App\Models\ProductPayment;
use App\Repositories\WalletTransaction\Enums\WalletTransactionStatus;

class PaymentProduct extends PaymentStrategy
{
    protected $prefix = 'PAYMENT';

    public function genarateCode($id)
    {
        $productPayment = ProductPayment::find($id);

        if (empty($productPayment)) {
            return null;
        }

        $code = $this->prefix . $productPayment->id;

        $dataCreatePayment  = [
            'type' => TypePayment::PRODUCT,
            'payment_code' => $code,
            'object_target_id' => $productPayment->id
        ];

        $data = $this->savePaymentCode($dataCreatePayment);

        return $data->payment_code;
    }

    public function handleWebhook(Payment $payment, $amount)
    {
        $productPayment = ProductPayment::find($payment->object_target_id);

        if (empty($productPayment)) {
            return [
                'status'    =>  false,
                'message'   => 'Không tồn tại giao dịch!',
            ];
        }

        if ($amount < ProductPayment::PRICE) {
            return [
                'status'    =>  false,
                'message'   => 'Không đủ tiền giao dịch!',
            ];
        }

        $productPayment->status = Status::SUCCESS->value;

        $productPayment->save();

        return true;
    }
}
