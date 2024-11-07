<?php

namespace App\Observers;

use App\Models\ProductPayment;
use App\Services\ProductPayment\ProductPaymentService;

class ProductPaymentObserver
{
    private $productPaymentService;

    public function __construct(ProductPaymentService $productPaymentService)
    {
        $this->productPaymentService = $productPaymentService;
    }

    public function created(ProductPayment $productPayment) {
        $this->productPaymentService->makeDownloadCode($productPayment);

    }

    public function updated(ProductPayment $productPayment): void
    {
        $this->productPaymentService->updateSuccessObserver($productPayment);
    }
}
