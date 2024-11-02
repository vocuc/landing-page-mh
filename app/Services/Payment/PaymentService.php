<?php

namespace App\Services\Payment;

use App\Enums\Payments\TypePayment;
use App\Models\Payment;

class PaymentService
{
    public function extractMessagePayment($message)
    {
        preg_match('/GD: \+([0-9,]+)VND/', $message, $gdMatches);

        preg_match('/\b\w*WALLET\w*\b/', $message, $paymentCode);

        if(isset($paymentCode[0]) && isset($gdMatches[1])) {
            return [
                'amount' => floatval(str_replace(',', '', $gdMatches[1])),
                'payment_code' => $paymentCode[0]
            ];
        }

        return [];
    }

    public function genaratePayment($id, $amount, TypePayment $type)
    {
        $payemntTypeInstance = null;

        if ($type === TypePayment::PRODUCT) {
            $payemntTypeInstance = new PaymentProduct();
        } 

        $paymentContext = new PaymentStrategyContext($payemntTypeInstance);

        $paymentCode = $paymentContext->getPaymentCode($id);

        if ($paymentCode === null) {
            return false;
        }

        $linkQrCode = $this->genarateQRAmount($paymentCode, $amount);

        $dataPaymentCode = [
            'payment_code' => $paymentCode,
            'link_qr_code' => $linkQrCode,
            'content' => 'GMV ' . $paymentCode
        ];

        return $dataPaymentCode;
    }

    private function genarateQRAmount($paymentCode, $amount)
    {
        $qrcode = 'https://qr.limcorp.vn/qrcode.png?' . 'bank=' .
            config('constants.QR_INFORMATION.BANK_NUMBER') .
            '&number=' . config('constants.QR_INFORMATION.ACCOUNT_NUMBER') .
            '&amount=' . $amount .
            '&content=GMV ' . $paymentCode;
        return $qrcode;
    }

    public function getPayment($paymentCode)
    {
        return Payment::where('payment_code', $paymentCode)->first();
    }
}
